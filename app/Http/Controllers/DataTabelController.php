<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Facades\Datatables;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Author;
use App\Post;

class DataTabelController extends Controller
{
    public function index(){
    	
    	return view('data-table.index');
    }

    public function dataAuthor(){
    	return Datatables::eloquent(Author::query())->make(TRUE);
    }

    public function dataPost(){
    	return Datatables::eloquent(Post::with('author')->select('posts.*'))->make(TRUE);
    }
}
