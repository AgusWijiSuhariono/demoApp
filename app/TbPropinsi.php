<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbPropinsi extends Model
{
    protected $table = "tb_propinsi";
    protected $primaryKey = "propinsi_id";
    public $timestamps = false;

    public function scopeSearchBy($query,$search){
    	$search = trim($search);
    	if($search!=''){
    		$query->where('nama','like','%'.$search.'%');
    	}
    	return $query;
    }
}
