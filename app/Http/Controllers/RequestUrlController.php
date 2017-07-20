<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TbPropinsi;
class RequestUrlController extends Controller
{
    public function findPropinsi(Request $request){
    	$fasilitas = TbPropinsi::searchBy($request->search)->limit(10)->get();
    	
    	foreach ($fasilitas as $key => $value) {
            $list[$key]['id'] = $value->propinsi_id;
            $list[$key]['text'] = $value->nama; 
        }

        if(!empty($list)){
        	return json_encode($list);
    	}else{
    		$list = [];
    		return $list;
    	}
    }
}
