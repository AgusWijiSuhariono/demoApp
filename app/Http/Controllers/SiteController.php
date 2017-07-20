<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TbBlog;
use App\TbKategori;
use App\Http\Requests\SiteRequest;
use Mail;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = TbBlog::all();

        return view('site.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $blog = new TbBlog;
        $kategori = TbKategori::lists('nama_kategori','id_kategori');

        if($request->ajax()){
            return view('site.create',compact('blog','kategori'))->renderSections()['content'];
        }else{
            return view('site.create',compact('blog','kategori'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteRequest $request)
    {
        $blog = new TbBlog;
        $blog->id_kategori = $request->id_kategori;
        $blog->tanggal = $request->tanggal;
        $blog->judul = $request->judul;
        $blog->isi = $request->isi;
        $blog->status = $request->status;

        $blog->save();

        if($request->ajax()){
            \Session::flash('flash_message','data berhasil disimpan');
            $response = array(
                'status' => 'success',
                'url' => action('SiteController@index'),
                );
            return $response;
        }else{
            \Session::flash('flash_message','data berhasil di simpan');
            return redirect()->action('SiteController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $blog = TbBlog::find($id);
        
        return view('site.show',compact('blog'))->renderSections()['content'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = TbBlog::find($id);
        $kategori = TbKategori::lists('nama_kategori','id_kategori');



        return view('site.edit',compact('blog','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteRequest $request, $id)
    {
        $blog = TbBlog::find($id);
        $blog->id_kategori = $request->id_kategori;
        $blog->tanggal = $request->tanggal;
        $blog->judul = $request->judul;
        $blog->isi = $request->isi;
        $blog->status = $request->status;

        $blog->save();
        \Session::flash('flash_message','data berhasil di update');

        return redirect()->action('SiteController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = TbBlog::destroy($id);

        \Session::flash('flash_message','data berhasil di hapus');

        return redirect()->action('SiteController@index');
    }

    public function formMail(){
        return view('site.formMail');
    }

    public function sendMail(Request $request){
        $this->validate($request,[
                'email' => 'required',
                'subjek' => 'required',
                'pesan' =>'required',
                'opsi_template' => 'required'
            ]);
        if($request->opsi_template==2){
            $sendMail = Mail::raw($request->pesan, function ($message)use($request) {
                $message->from('bijiagus@gmail.com','Agus Wiji Suhariono');
                $message->subject($request->subjek);
                $message->to($request->email);
            });
        }else{
            $sendMail = Mail::send('email.template', ['request'=>$request], function ($message)use($request){
                $message->from('bijiagus@gmail.com','Agus Wiji Suhariono');
                $message->subject($request->subjek);
                $message->to($request->email);
            });
        }
        if($sendMail){
             \Session::flash('flash_message','Email berhasil dikirim');

            return redirect()->action('SiteController@formMail');
        }
    }

    public function template(Request $request){
        return view('email.template',compact('request'));
    }
}
