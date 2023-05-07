<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Reward;
use App\Models\Setting;

class RewardController extends Controller
{
    public function index()
    {
        $rewardInfos = array();
        $rewards = Reward::where('withdraw', false)->get();
        $settings = Setting::first();

        foreach ($rewards as $reward) {
            $temp = array(
                'name' => $reward->name,
                'url' => $reward->fileName,
                'stars' => $reward->stars,
                'rewardId' => $reward->rewardId,
                'isDisabled' => $reward->stars > $settings->stars,
            );
            $rewardInfos[] = $temp;
        }
      
        return view('reward', ['rewards'=> $rewardInfos, 'totalStars'=>$settings->stars]);
    }



    public function upload(Request $request)
    {
        // Get the file from the request
        $file = $request->file('file');

        $path = $request->file('file')->storePublicly('public');
        $fileName = basename($path);
        $url = Storage::disk('local')->url('public/' . $fileName);
       
        if($request) {
            $reward = new Reward;
            $reward->name = $request->input('rewardName');
            $reward->fileName = $url;
            $reward->stars = $request->input('starNumber');
            $reward->withdraw = false;

            $reward->save();
        }
        
        return redirect()->back();
    }

    public function claim(Request $request)
    {
        $data = $request->input('rewardId');
        
        $reward = Reward::find($data);
        $settings = Setting::first();
        $settings->stars -= $reward->stars;
    
        if ($reward->delete()) {
            $settings->save();
            return response()->json([
                'success' => true,
            ]);
        }
    }

    public function remove(Request $request)
    {
        $data = $request->input('rewardId');
        
        $reward = Reward::find($data);
    
        if ($reward->delete()) {
            return response()->json([
                'success' => true,
            ]);
        }
    }

}
