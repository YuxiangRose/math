<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\Setting;

class SettingController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::first();
        return view('setting', ['settings'=> $settings]);
    }

    public function saveSetting(Request $request)
    {
        
        $settings = Setting::first();
      
        $settings->settingId = $settings->settingId;
        $settings->max = $request->input('max');
        $settings->min = $request->input('min');
        $settings->numberOfQuestion = $request->input('number_of_questions');
        $settings->percentageForPass = $request->input('percentage_for_pass');
        $settings->factor = $request->input('factor');
        $settings->rewardRate = $request->input('reward_rate');
        $settings->timeLimitaion = $request->input('time_limitation');
        $settings->addition = $request->input('addition') == 'on' ? 1 : 0;
        $settings->subtraction = $request->input('subtraction') == 'on' ? 1 : 0;
        $settings->multiplication = $request->input('multiplication') == 'on' ? 1 : 0;
        $settings->division = $request->input('division') == 'on' ? 1 : 0;

        $settings->save();

        return redirect()->back();
    }
}
