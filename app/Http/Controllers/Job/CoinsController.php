<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coins;
use Auth;

class CoinsController extends Controller
{
    public function __construct(Coins $mcoins){
        $this->mcoins = $mcoins;
    }
    public function index(){
        $coin    = $this->mcoins->findCoin(Auth::user()->id);
        $countId = $this->mcoins->countId(Auth::user()->id);
        $xu      = $this->mcoins->getCoin();
        return view('job.coin.vnpay-coin', compact('coin', 'countId', 'xu'));
    }
    public function getVnpay(Request $request){
        $data = $request->all();
        // dd($data);
        $vnp_SecureHash = $request->vnp_SecureHash;
        $vnp_HashSecret = "DTHXNFNBUMNKFKQOZVHTXUXNUQUUXMTV";
        $inputData = array();
        foreach ($_GET as $key => $value) {
            $inputData[$key] = $value;
        }
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }

        $secureHash = hash('sha256',$vnp_HashSecret . $hashData);
    
        
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                if($request->vnp_Amount == 2000000){
                    $number_coin = 20;
                }else if($request->vnp_Amount == 5000000) {
                    $number_coin = 50;
                }else if($request->vnp_Amount == 10000000){
                    $number_coin = 100;
                }
                $coin    = $this->mcoins->findCoin(Auth::user()->id);
                $countId = $this->mcoins->countId(Auth::user()->id);
                if($countId){
                    if($coin->id == Auth::user()->id){
                        $this->mcoins->incrementCoin(Auth::user()->id,$number_coin);
                    }
                }else {
                    $data = ['id' => Auth::user()->id,
                        'number_coin' => $number_coin,
                        ];
                    $this->mcoins->addCoin($data);
                }
                return redirect()->route('job.coin.vnpay-coin')->with('msg', 'Giao dịch thành công');
            } else {
                return redirect()->back()->with('msg', 'Giao dịch không thành công');
            }
        } else {
            echo "Chu ky khong hop le";
        }
    }
    public function postVnpay(Request $request){
        if($request->number_coin == 20){
            $amount = $request->amount += 20000;
        }elseif($request->number_coin == 50){
            $amount = $request->amount += 50000;
        }else if($request->number_coin == 100){
            $amount = $request->amount += 100000;
        }
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        //$vnp_Returnurl = "http://localhost/vnpay_php/vnpay_return.php";
        $vnp_TmnCode    = "Y4U88XFK";//Mã website tại VNPAY 
        $vnp_HashSecret = "DTHXNFNBUMNKFKQOZVHTXUXNUQUUXMTV"; //Chuỗi bí mật
        $vnp_ReturnUrl  = route('success-vnpay');

        $vnp_TxnRef    = $request->coins_id;//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->coins_desc;
        $vnp_OrderType = $request->coins_type;
        $vnp_Amount    = $amount * 100;
        $vnp_Locale    = $request->language;
        $vnp_IpAddr    = $_SERVER['REMOTE_ADDR'];
        $vnp_BankCode  = $request->bank_code;
        $inputData     = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,   
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,    
        );
        ksort($inputData);
        if(isset($vnp_BankCode) && $vnp_BankCode != ''){
            //$inputData
        }
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash('sha256',$vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect()->to($vnp_Url);
    }
}
