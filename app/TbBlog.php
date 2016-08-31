<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbBlog extends Model
{
    protected $table = "tb_blog";

    public $timestamps = false;

    public function kategori()
    {
    	return $this->belongsTo('App\TbKategori','id_kategori');
    }

    public function statusBlog()
    {
    	if($this->status==1){
    		return "Aktif";
    	}else{
    		return "Non Aktif";
    	}
    }
}
