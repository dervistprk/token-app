<?php

namespace App\Http\Controllers;

use App\Models\Tokens;
use Illuminate\Http\Request;

class GetTokenController extends Controller
{
    public function getToken(SetTokenController $token){
        $string = $token->cronJob();
        return view('getToken', compact('string'));
    }

    public function validateToken(Request $request){
        $last_token = Tokens::orderBy('created_at', 'desc')->first();
        if($last_token->token == $request->token){
            return redirect()->route('result')->with('message', 'Token Doğru');
        } else{
            return redirect()->route('result')->with('error', 'Token Yanlış');
        }
    }
}
