<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Recruitment;
use App\Coins;
use Carbon\Carbon;
use Auth;

class PinController extends Controller
{
    public function __construct(Recruitment $mrecruitment, Coins $mcoins){
        $this->mrecruitment = $mrecruitment;
        $this->mcoins       = $mcoins;
    }
    public function postPin(Request $request){
        $id          = $request->id;
        $now         = Carbon::now("Asia/Ho_Chi_Minh");
        $pin_date    = $now->addDays(3);
        $number_coin = 10;
        $data = ['recruitment_id' => $id,
                 'pin'            => 1,
                 'pin_date'       => $pin_date,
                ];
        $countId  = $this->mcoins->countId(Auth::user()->id);
        $findCoin = $this->mcoins->findCoin(Auth::user()->id);
        $pin      = $this->mrecruitment->getPin();
        foreach($pin as $pins){
            if($pins->pin >= 6){
                return response()->json([
                    'errorPin' => 'error',
                ]);
            }
        }
        if($countId){
            if($findCoin->number_coin){
                $this->mrecruitment->addPin($data, $id);
                $this->mcoins->decrementCoin(Auth::user()->id, $number_coin);
            }
            return response()->json([
                'success' => 'success',
            ]);
        }else {
            return response()->json([
                'error' => 'error',
            ]);
        }        
    }
    public function postUpdatepin(Request $request){
        $id   = $request->id;
        $data = ['recruitment_id' => $id,
                 'pin'            => 0,
                ];
        $result = $this->mrecruitment->addPin($data, $id);
    }
}
