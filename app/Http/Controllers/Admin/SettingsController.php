<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
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
        return redirect()->back()->with('success','settings has been edited');
    }
}
