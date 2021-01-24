<?php

namespace App\Http\Controllers\Admin;

use App\Events\adminSendNotification;
use App\Events\userRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\adminSendNotificationRequest;
use App\Http\Requests\LevelCostStoreRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Level_finance;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index')->with('settings',Setting::all());
    }
    public function update(UpdateSettingRequest $request):RedirectResponse
    {
        $data = $request->except(['_token']);
        foreach (Setting::all() as $setting)
        {
            $setting->where('setting_name',$setting->setting_name)->update([
                'setting_value'=>$data[$setting->setting_name]
            ]);
        }
        return redirect()->back()->with('success',trans('lang.settings has been edited'));
    }
    public function getLevelCost($level): JsonResponse
    {
        $level = Level_finance::where('level',$level)->first();
        return response()->json([
            'status'=>true ,
            'assign_cost'=>$level->assign_cost ,
            'forth_cost'=>$level->forth_cost
        ]);
    }
    public function storeLevelCost(LevelCostStoreRequest $request)
    {
      Level_finance::where('level',$request->level_number)->update([
          'assign_cost'=>$request->assign_cost ,
          'forth_cost'=>$request->forth_cost
      ]);
      return redirect()->back()->with('success' ,trans('lang.done'));

    }
    public function sendNotification()
    {
        return view('admin.sendNotification.index');
    }
    public function storeNotification(adminSendNotificationRequest $request): RedirectResponse
    {
        Event(new adminSendNotification($request->message_en , $request->message_ar));
        return redirect()->back()->with('success',trans('lang.done'));

    }
    public function controlLiveChat(Request $request): RedirectResponse
    {
        Setting::where('setting_name','liveChatStatus')->update([
            'setting_value'=>$request->liveChatStatus
        ]);
        return redirect()->back()->with('success' ,trans('lang.done'));
    }
}
