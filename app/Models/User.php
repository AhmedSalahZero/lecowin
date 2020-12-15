<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','password','rule_id','phone','address','passport_info','sub_of','image' ,'code','activated_at'];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = [
        'activated_at'
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
            // generate code depends on id A-000 000 + id
            $user->levels()->attach([
                'level'=>self::default_level
            ]);
            $network=Network::create([
                'user_id'=>$user->parent->id ,
                'networker_id'=>$user->id ,
                'level'=>self::default_level
            ]);

            // add finance for his parent
            $user->parent->finances()->create([
                'network_id'=>$network->id ,
                'amount'=>level_object(self::default_level)->assign_cost ,
                'reason'=>'assign' ,
                'level_id'=>self::default_level
            ]);


            $user->parent->updateParentLevel($user);
            Auth()->attempt([
                'email'=>$user->email,
                'password'=>Request()->password
            ], true);
            return redirect()->route('account.index');
/*
 * End Clean ?
 * */
        });

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
            'name'=>$request->name ,
            'email'=>$request->email ,
            'phone'=>$request->phone ,
            'address'=>$request->address
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
                    'networkers'=>$level->users->where('sub_of',$this->id)
                ];
            });
    }

    public function CountLevelNetWorkers($level):int //level members for the user
    {
        return $level->users->where('sub_of',$this->id)->count();
    }
    public function levelAssignCost($level):float
    {
        return $level->assign_cost;
    }
    public function levelFourthCost($level):float
    {
        return $level->forth_cost;
    }

    public function CountLevelProfit($level)
    {
        return $this->levelAssignCost($level) * $this->CountLevelNetWorkers($level);
    }
    public function CountLevelsProfit()
    {
        return $this->levels->sum(function($level){
            return $this->levelAssignCost($level) * $this->CountLevelNetWorkers($level);
        });
    }

    public function CountLevelForthCost($level)
    {
        $levelNetWorkers = (floor($this->CountLevelNetWorkers($level) /4 )-1) ;
        return  $levelNetWorkers < 0 ? 0 : $levelNetWorkers *$this->levelFourthCost($level);
    }

//    public function CountLevelForthCost($level)
//    {
//        $numberOfChunks = $this->NumberOfChunks($level)-1 ;
//        $numberOfChunks = $numberOfChunks <= 0 ?0  :$numberOfChunks;
//        return $numberOfChunks*$this->levelFourthCost($level);
//    }


    public function CountLevelsForthCost()
    {
        return $this->levels->sum(function($level){
            return $this->CountLevelForthCost($level);
        });
    }
//
//    public function NumberOfChunks($level){
//        $chunks= $level->users->where('sub_of',$this->id)->chunk(4);
//        return $this->filterChunks($chunks)->count();
//    }
//    protected function filterChunks($chunks){
//
//        return $chunks->filter(function($chunk):bool{
//           return $chunk->count() == 4  ;
//        });
//    }
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

    protected function generateCode():string
    {

        $idLength = strlen($this->id);
        $numberOfZeros = 7 - $idLength ;
        $zeros = str_repeat(0,$numberOfZeros);
        return  ('A-'.$zeros . $this->id) ;
    }

    protected function findParentId($code)
    {

        return User::whereCode($code)->first()->id;
    }
    public function updateParentLevel($child)
    {
        /*
         * Clean Code ;
         *
         * */
        $numberOfChildrenWithTheSameLevel = $this->countChildrenWithTheSameLevel($this->getMaxLevel());
        if ($numberOfChildrenWithTheSameLevel == 4)
        {

            $currentParentLevel = $this->getMaxLevel() ;
        if($currentParentLevel != self::maxLevelLimit)
        {
            $this->levels()->attach([
                'level'=>$currentParentLevel+1   ,
            ]);
            $network =  $this->netWorks()->create([
                'networker_id'=>$child->id  ,
                'level'=>$currentParentLevel+1 ,
                'user_id'=>$this->id
            ]);
            /*
             * Add Finance to the parent ;
             *
             * */
            if ($this->parent)
            {
                $this->parent->finances()->create([
                    'user_id'=>$this->parent->id,
                    'network_id'=>$network->id,
                    'level_id'=>$currentParentLevel+1,
                    'amount'=>level_object($currentParentLevel+1)->assign_cost ,
                    'reason'=>'assign'
                ]);
            }
        }
        else{
            $network =  $this->netWorks()->create([
                'networker_id'=>$child->id  ,
                'level'=>$currentParentLevel ,
                'user_id'=>$this->id
            ]);
            /*
             * Add Finance to the parent ;
             *
             * */
          if($this->parent)
          {
              $this->parent->finances()->create([
                  'user_id'=>$this->parent->id,
                  'network_id'=>$network->id,
                  'level_id'=>$currentParentLevel,
                  'amount'=>level_object($currentParentLevel)->assign_cost ,
                  'reason'=>'assign'
              ]);

          }

        }

        }
    }
    protected function findChildrenWithTheSameLevel($parentLevel)
    {
         return $this->children->keyBy('id')->map(function($child) use ($parentLevel){
         return $child->levels->where('level',$parentLevel);
     })->filter(function($item){
           // get none empty collections only
           return count($item);
       });
    }

    protected function countChildrenWithTheSameLevel($parentLevel)
    {
        return $this->findChildrenWithTheSameLevel($parentLevel)->count();
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
    public function addTransactionAsReceiver(Request $request,$reason,$amount):Model
    {
      return  $this->transactionsAsReceiver()->create([
            'receiver_id'=>$this->id ,
            'sender_id'=>Auth()->user()->id ,
            'reason'=>$reason ,
            'amount'=>($request->amount?$request->amount:$amount)
        ]);
    }
    public function addFinance(Request $request,$reason):model
    {
        return $this->finances()->create([
            'reason'=>$reason ,
            'amount'=>$request->amount  ,
            'level_id'=>$this->getMaxLevel()
        ]);
    }
    public function isActivated()
    {
        return $this->code ;
//        return $this->finances->keyBy('reason')->has('activation by admin') ||
//               $this->finances->keyBy('reason')->has('activation by user');
    }
    protected function AddFinanceByAmount($amount , $reason):void
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
        $this->AddFinanceByAmount($this->getActivationAmount()* -1, ($admin ? self::activation_by_admin : self::activation_by_user));
        if($admin)
        {
            $this->AddFinanceByAmount($this->getActivationAmount(), self::activation_by_admin);
            $this->addTransactionAsReceiver($request ,'account activation' ,$this->getActivationAmount());
            $this->addTransactionAsReceiver($request ,'account activation' ,$this->getActivationAmount()*-1);
        }
        $this->code =$this->generateCode();
        $this->activated_at = Now();
        $this->save();
            return true;
    }
    public static function findReceiver(Request $request)
    {
        return User::where('email',$request->receiver_email)->where('phone',$request->receiver_phone)->first();
    }
    public function hasEnoughMoney():bool
    {
        return $this->finances->sum('amount') >= $this->getActivationAmount() ;
    }
    public function sendMoneyTo(User $receiver,Request $request):void
    {
        $receiver->AddFinanceByAmount($request->amount , self::userTransfer);
        $this->AddFinanceByAmount($request->amount*-1 , self::userTransfer);
        $receiver->addTransactionAsReceiver($request , self::userTransfer,null);
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
}
