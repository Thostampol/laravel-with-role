<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\ClearanceMiddleware;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Gallery;
use Auth;
use Image;
use Session;
use DB;

class GalleryController extends Controller
{
    public function __construct(){
        $this->middleware(array('auth',ClearanceMiddleware::class))->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderby('id','desc')->paginate(5);
        return view('backend.pages.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pages.gallery.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'filename' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        // if($request->hasfile('filename')){
        //     $file = $request->file('filename');
        //     $nameFile = time()."_gallery_".$file->getClientOriginalName();
        //     $file->move(storage_path().'/app/public/', $nameFile);
        // }

        $file = Input::file('filename');
        $nameFile = Image::make($file);
        Response::make($nameFile->encode('jpeg'));
        
        $save = new Gallery;   
        $save->name       = $request->namegallery;     
        $save->keterangan = $request->keterangan;
        $save->filename   = $nameFile;
        $save->save();  
        //DB::unprepared(DB::raw("insert into galleries (name,keterangan,filename) values ('".html_entity_decode($request->namegallery)."','".html_entity_decode($request->keterangan)."','".pg_escape_bytea($nameFile)."')")); 
        return redirect('/galleries')->with('success','Information has been Added');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function showImage($id){
        $picture = Gallery::findOrFail($id);
        $pic = Image::make($picture->filename);
        $response = Response::make($pic->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');
        return $response;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
