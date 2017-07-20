<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use LRedis;

class SocketController extends Controller
{
  	public function index()
	{
		return view('chat.socket');
	}

	public function writemessage()
	{
		return view('chat.writemessage');
	}

	public function sendMessage(Request $request){
		$redis = LRedis::connection();
		$redis->publish('message',['message'=>$request->message]);
		return redirect()->action('SocketController@index');
	}
}
