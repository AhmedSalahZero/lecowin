<?php

namespace App\Models;

use App\Events\financeAdded;
use App\Events\newAchievement;
use App\Events\newAchievement2;
use App\Events\newNetWorkerAdded;
use App\Events\userRegistered;
use App\Events\userSentMoneyToAdmin;
use App\Events\userSentMoneyToUser;
use App\Notifications\newUserRegistered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\XSession;
use phpDocumentor\Reflection\Types\Boolean;

class User extends Authenticatable
{
      use HasFactory, Notifiable;
    const default_rule = 2 ; // 1- admin    2-user
    const default_image_url = 'profile/default_profile_image.jpg';
    const default_level = 1 ;
    const maxLevelLimit = 10 ;
    const adminTransfer = 'admin transfer';
    const userTransfer = 'user transfer' ;
    const activation_by_admin = 'activation by admin';
    const activation_by_user='activation by user' ;
    const discountPercentage = 10 ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name' ,'last_name','email','password','rule_id','phone','address','passport_info','sub_of','image' ,'code',
        'activated_at','transfer_password','WhatsApp','birthday','social_status','job','official_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function scopeRealUsers($query):builder
    {
        return $query->where('id','<>',0); // <> is equal to !=
    }
    public function scopeNotificationUser($query):builder
    {
        return $query->where('id',0); // <> is equal to !=
    }

    public function scopeGetAdmin($query):builder
    {
        return $query->where('rule_id',1);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = [
        'activated_at' ,
        'birthday'
    ];


    public static function boot()
    {
        parent::boot();
        static::creating(function($user)
        {
            $user->sub_of = $user->findParentId(Request()->parentCode);
            $user->rule_id = self::default_rule;
            $user->image =self::default_image_url ;
            $user->password=Hash::make(Request()->password);
        });
        static::created(function($user){
            // add me in level number 1
            $user->addLevel(self::default_level);
            Event(new userRegistered($user));
            Auth()->attempt([
                'email'=>$user->email,
                'password'=>Request()->password
            ], true);
            return redirect()->route('user.home',App()->getLocale());
        });
    }
    private function updateMyParent($parent,$child)
    {
        if($parent) // for example the admin has no parent .. then this will display an error
        {
            if($parent->hasFourNetWorkersOrItsMultiplesInMyLevel($child->getMaxLevel())){
                // there is two paths [if the forth is the first or not]
                // then if was the first four
                // if has four or more send public notification for all users with this achievement
                // postponed
                Event(new newAchievement($parent,$child->getMaxLevel(),$parent->countLevelNetWorker($child->getMaxLevel())));
                if($parent->hasTheFirstFourNetWorkerInMyLevel($child->getMaxLevel())){

                    if($parent->getMaxLevel() != self::maxLevelLimit)
                        $parent->addLevel($child->getMaxLevel()+1);
                    $parent->addLevel($child->getMaxLevel()+1); // my level + 1
                    if ($parent->parent)
                    {
                        // add new netWorker to his parent with my level
                        $parent->parent->addNewNetWorker($parent , $child->getMaxLevel());
                        // is his parent has four netWorker or its multiplies in son level ?
                        $parent->updateMyParent($parent->parent,$parent);
                        // add new netWorker to his best parent with his son level
                        $bestParent = $parent->getClosetParentWithEqualOrHigherLevel($parent->getMaxLevel() ,$parent->parent);
                        $network = $bestParent->addNewNetWorker($parent, $parent->getMaxLevel());
                        $bestParent->addNewFinance($network,$parent->getMaxLevel(),level_object($parent->getMaxLevel())->assign_cost,'assign');
                        $parent->updateMyParent($bestParent,$parent);
                    }
                }
                else{
                    $parent->addNewFinance(optional(null) , $child->getMaxLevel() , level_object($child->getMaxLevel())->forth_cost , 'forth');
                    if($parent->parent)
                    {
                        $parent->parent->addNewNetWorker($parent,$child->getMaxLevel());
                        //$parent->addNewNetWorker($child,$child->getMaxLevel());
                        $parent->updateMyParent($parent->parent,$child);
//                        $parent->updateMyParent($parent->parent,$parent);
                    }
                }
            }
        }
    }
    public function hasFourNetWorkersOrItsMultiplesInMyLevel($myLevel):bool
    {
        return $this->myNetworker()->whereLevel($myLevel)->count() % 4 === 0 && $this->myNetworker()->whereLevel($myLevel)->count()  != 0 ;
    }
        public function countLevelNetWorker($myLevel):int
    {
        // $this [the parent]
        // it may be 8 12 16 .. etc
        return $this->myNetworker()->whereLevel($myLevel)->count();
    }

//    public function hasMoreThanFourMultiplesNetWorkerInMyLevel($myLevel):bool
//    {
//        // $this [the parent]
//        // it may be 8 12 16 .. etc
//        return $this->myNetworker()->whereLevel($myLevel)->count() > 4;
//    }
    public function hasTheFirstFourNetWorkerInMyLevel($myLevel):bool
    {
        return $this->myNetworker()->whereLevel($myLevel)->count() == 4;
    }
    protected function addLevel($level):void
    {
        $this->levels()->attach([
            'level'=>$level
        ]);
    }
    protected function addNewNetWorker($netWorker,$level):model
    {
        Event(new newNetWorkerAdded($this , $netWorker , $level));
        return  Network::create([
            'user_id'=>$this->id ,
            'networker_id'=>$netWorker->id,
            'level'=>$level
        ]);
    }
    protected function addNewFinance($network,$level,$amount,$reason):model
    {
        event(new FinanceAdded($this,$amount));
        return Finance::create([
            'user_id'=>$this->id ,
            'network_id'=>$network->id ,
            'level_id'=>$level,
            'amount'=>$amount ,
            'reason'=>$reason
        ]);

    }
    protected function setTransferPasswordAttribute($value)
    {
        $this->attributes['transfer_password'] = Hash::make($value);
    }
    protected function setBirthdayAttribute($value)
    {
        $this->attributes['birthday']=format_date($value);
    }
    public function rule():BelongsTo
    {
        return $this->belongsTo(Rule::class , 'rule_id' , 'id');
    }
    public function documentations():hasMany
    {
        return  $this->hasMany(Library::class , 'created_by','id');
    }
    public function levels():BelongsToMany
    {
        return $this->belongsToMany(Level_finance::class,'level_user','user_id','level','id','level');
    }
    public function netWorks():HasMany
    {
        return $this->hasMany(Network::class , 'networker_id' , 'id');
    }
    // get my networkers
    public function myNetworker()
    {
        return $this->hasMany(Network::class ,'user_id' ,'id');
    }
    public function finances():HasMany
    {
        return $this->hasMany(Finance::class , 'user_id','id');
    }
    public function children():HasMany
    {

        return $this->hasMany(User::class,'sub_of','id');
    }
    public function tasks():hasMany
    {
        return $this->hasMany(Task::class,'user_id','id');
    }
    public function ChangeProfileImage($request)
    {
        $this->update([
            'image'=>$request->image->store('profile','public')
        ]);
    }
    public function ChangePassportImage($request)
    {
        $this->update([
            'passport_info'=>$request->image->store('profile','public')
        ]);
    }
    public function parent()
    {
        return $this->belongsTo(User::class,'sub_of','id');
    }
    public function transactionsAsSender():hasMany
    {
        return $this->hasMany(Transaction::class , 'sender_id','id');
    }
    public function transactionsAsReceiver():hasMany
    {
        return $this->hasMany(Transaction::class , 'receiver_id','id');
    }
    public function EditAccount($request)
    {
        $this->update([
            'first_name'=>$request->first_name ,
            'last_name'=>$request->last_name,
            'job'=>$request->job,
            'birthday'=>$request->birthday,
            'email'=>$request->email ,
            'phone'=>$request->phone ,
            'address'=>$request->address ,
            'social_status'=>($request->social_status == 'null' ? null :$request->social_status) ,
            'WhatsApp'=>$request->WhatsApp ,
            'official_id'=>$request->official_id ,

         ]);
    }
    public function changeProfilePassword($request):array
    {
        if (!($request->new_password === $request->confirm_new_password))
            return [
                'fail'=>'notConfirmed'
            ];
        else if (!Hash::check($request->old_password, $this->password))
            return [
                'fail'=>'old password not Matched !'
            ];
        else{
            $this->update([
                'password' => Hash::make($request->new_password)
            ]);
            return [
                'success'=>'password has been edited'
            ];
        }
    }

    public function loginUser():void
    {
        Auth()->attempt([
            'email'=>$this->email,
            'password'=>Request()->new_password
        ], true);
    }
    public function resetPassword($request):array
    {
        $this->update([
            'password' => Hash::make($request->new_password)
        ]);
        return [
            'success'=>'password has been edited'
        ];
    }
    public function getBasicProfit()
    {
        return $this->finances->sum('amount');
    }
    public function getMaxLevel():int
    {

        return $this->levels->max('level');
    }
    public function countTotalNetworks():int
    {
        return $this->levels->sum(function($level){
            return $this->CountLevelNetWorkers($level);
        });
    }
    public function levelNetWorkers():collection
    {
        return $this->levels->keyBy('level')->map(function($level){
            return [
                'level'=>$level ,
                'networkers'=>$level->networks->where('user_id',$this->id)
            ];
        }
        );
    }
    public function CountLevelNetWorkers($level):int //level members for the user
    {
        return ($level->networks->where('user_id',$this->id)->count());
    }
    public function CountUniqueLevelNetWorkers($level):int //level members for the user
    {
        return $level->networks->where('user_id',$this->id)->unique('networker_id')->count();
    }
    public function uniqueLevelNetWorkers($level):collection //level members for the user
    {
        return $level->networks->where('user_id',$this->id)->unique('networker_id');
    }
    public function levelFourthCost($level):float
    {
        return $level->forth_cost;
    }
    public function CountLevelProfit($level)
    {
        return $this->uniqueLevelNetWorkers($level)->sum(function($network) {
            return $network->finance->amount ;
        });
    }
    public function CountLevelsProfit()
    {
        return $this->levels->sum(function($level){
            return $this->CountLevelProfit($level) ;
        });
    }
    public function CountLevelForthCost($level)
    {
        $levelNetWorkers = (floor($this->CountLevelNetWorkers($level) /4 )-1) ;
        return  $levelNetWorkers < 0 ? 0 : $levelNetWorkers *$this->levelFourthCost($level);
    }
    public function CountLevelsForthCost()
    {
        return $this->levels->sum(function($level){
            return $this->CountLevelForthCost($level);
        });
    }
    public function levelTotalProfit($level)
    {
        return $this->CountLevelProfit($level) + $this->CountLevelForthCost($level);
    }
    public function totalNetworkProfit()
    {
        return $this->levels->sum(function($level){
            return $this->levelTotalProfit($level);
        });
    }
    public function totalCash():float
    {
        return $this->finances->sum('amount');
    }
    public function generateCode():string
    {
        $idLength = strlen($this->id);
        $numberOfZeros = 7 - $idLength ;
        $zeros = str_repeat(0,$numberOfZeros);
        return  ('AE-'.$zeros . $this->id) ;
    }
    protected function findParentId($code)
    {
        return User::whereCode($code)->first()->id;
    }
    public function getArchivedTasks():collection
    {
        return $this->tasks()->where('status','archived')->get();
    }
    public function countArchivedTasks():int
    {
        return $this->tasks()->where('status','archived')->count();
    }
    public function countCompletedTasks():int
    {
        return $this->tasks()->where('status','completed')->count();
    }
    public function countUncompletedTasks():int
    {
        return  $this->tasks()->where('status','uncompleted')->count();
    }
    public function addTransactionAsReceiver($reason,$amount):Model
    {
        return  $this->transactionsAsReceiver()->create([
            'receiver_id'=>$this->id ,
            'sender_id'=>Auth()->user()->id ,
            'reason'=>$reason ,
            'amount'=>$amount
        ]);
    }
    public function isActivated()
    {
        return $this->code ;
    }
    public function AddFinance($amount , $reason):void
    {
        $this->finances()->create([
            'reason'=>$reason ,
            'amount'=>$amount,
            'level_id'=>$this->getMaxLevel()
        ]);
    }
    public function activeUser(Request $request,$admin):bool
    {
        if ($this->isActivated())
            return false;
        $this->AddFinance($this->getActivationAmount()* -1, ($admin ? self::activation_by_admin : self::activation_by_user));
        if($admin)
        {
            $this->AddFinance($this->getActivationAmount(), self::activation_by_admin);
            $this->addTransactionAsReceiver('account activation' ,$this->getActivationAmount());
            $this->addTransactionAsReceiver('account activation' ,$this->getActivationAmount()*-1);
        }
        $this->code =$this->generateCode();
        $this->activated_at = Now();
        $this->save();
        $network=$this->parent->addNewNetWorker($this,self::default_level);
        // add new finance to my parent
        $this->parent->addNewFinance($network,self::default_level,level_object(self::default_level)->assign_cost ,'assign');
        $this->updateMyParent($this->parent,$this); //pass the parent and child
        return true;
    }
    public static function getUserFromHisCode($code)
    {
        $numericPart = (int) substr( $code,3);
        return User::where('id',$numericPart)->first();
    }
    public function hasEnoughMoney():bool
    {
        return $this->finances->sum('amount') >= $this->getActivationAmount() ;
    }
    public function sendMoneyTo(User $receiver,Request $request):void
    {
        $adminPercentage = ($request->amount)/self::discountPercentage ;
        $receiverAmount = $request->amount - $adminPercentage  ;
        Event(new userSentMoneyToUser($this ,$receiver,$receiverAmount));
          Event(new userSentMoneyToAdmin($this,$adminPercentage,self::discountPercentage));
        $receiver->AddFinance($receiverAmount , self::userTransfer);
        $receiver->getTheAdmin()->AddFinance($adminPercentage , self::userTransfer);
        $this->AddFinance($request->amount*-1, self::userTransfer);
        $receiver->addTransactionAsReceiver(self::userTransfer,$receiverAmount);
        $receiver->getTheAdmin()->addTransactionAsReceiver( self::userTransfer,$adminPercentage);
    }
    public function accountExpires():bool
    {
        if($this->isActivated())
            return differentInYears($this->activated_at);
        return true;
    }
    public function MoneySent():float
    {
        return $this->transactionsAsSender->sum('amount');
    }
    public function MoneyReceived():float
    {
        return $this->transactionsAsReceiver->sum('amount');
    }
    public function logout()
    {
        Auth()->logout();
    }
    public function activationPrice()
    {
        return abs($this->finances()->where('reason','LIKE','activation%')->orderBy('id','desc')->first()->amount);
    }
    public static function getActivationAmount():float
    {
        return (float)Setting::where('setting_name','activation_amount')->first()->setting_value;
    }

    protected function getClosetParentWithEqualOrHigherLevel($myLevel , $myParent,$i=1):model
    {
        if($i <= 10) {
            if ($myParent->getMaxLevel() >= $myLevel)
                return $myParent;
            else {
                if ($myParent->parent)
                    return $this->getClosetParentWithEqualOrHigherLevel($myLevel, $myParent->parent, ++$i);
                return $this->getTheAdmin();
            }
        }
        return $this->getTheAdmin();
    }
    public function getTheAdmin()
    {
        return User::where('rule_id' , 1)->first();
    }
    public function notAdmin()
    {
        return $this->rule_id == 2 ;
    }
    public function findAllChildren($myChildren)
    {
        $myChildren[$this->id] = $this->children;
        foreach ($this->children  as $child)
        {
//            dump($child->id);
            if($child->hasChildren())
                return $child->findAllChildren($myChildren);
            continue ;
        }
        return $myChildren ;
    }

    public function hasChildren()
    {
        return User::where('sub_of',$this->id)->exists();
    }
    public function generateMyProfileLink()
    {
        return url('/'.App()->getLocale().'/'.'profile/'.$this->generateCode()) ;
    }
    public function completedProfileInfoPercentage():string
    {
        $numberOfCompletedField = collect($this->only(['first_name','last_name' , 'email' , 'phone','WhatsApp','address' ,'passport_info','birthday','social_status','job','official_id']))->filter(function($item){
            return $item != null ;
        })->count() ;
        return  ((int)(($numberOfCompletedField / 11) * 100)) .' %' ;
    }
    public function myParents($parents , $i=1)
    {
        if($i != 10)
            if($this->parent)
            {
             $parents[$this->parent->id] = $this->parent ;
             return $this->parent->myParents($parents , ++$i); // with parent
            }
        return $parents ;
    }
    public static function achievementNotifications()
    {
        return User::notificationUser()->first()->notifications()->whereJsonContains('data',['type'=>'achievement'])->get() ;
    }

    public static function allUserNotifications()
    {
    return Auth()->user()->unreadNotifications->merge(
        User::notificationUser()->first()->notifications()->whereJsonContains('data',[
            'type'=>'public_notification'
        ])->get()
);

    }
}
