<?php

namespace App\Http\Controllers;

use App\Models\Tokens;
use Carbon\Carbon;

class SetTokenController extends Controller
{
    public function setToken($length = 10){
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $database_token        = new Tokens();
        $database_token->token = $randomString;
        $database_token->save();
        return $randomString;
    }

    public function cronJob(){
        $now         = Carbon::now();
        $last_token  = Tokens::orderBy('created_at', 'desc')->first();
        if(isset($last_token)){ //tablo boşken ilk tokenin oluşturulması için
            $crated_at   = Carbon::parse($last_token->created_at);
            $expire_time = $now->secondsSinceMidnight() - $crated_at->secondsSinceMidnight();
            $valid_time  = 600; //token geçerlilik süresi (saniye)
            if($expire_time > $valid_time){
                $token = $this->setToken(10);
                return $token;
            } else{
                return $last_token->token;
            }
        } else{
            $database_token        = new Tokens();
            $database_token->token = 'ilk_token';
            $database_token->save();
            return  $database_token;
        }
    }
}
