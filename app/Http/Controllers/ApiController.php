<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ApiController extends Controller
{
    public function gameScore($score,$cusomer_id){
        $newScore = User::where('id',$cusomer_id)->first()->walet_money;
        User::where('id',$cusomer_id)->update(['walet_money'=>$newScore]);
        return "game is scored";  
    }
}
