<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use Guzzle\Tests\Plugin\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
class ImageController extends Controller
{
     public function upload(){
        return view('imageupload');
    }


    public function store(Request $request){
        $image = new Image();
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required'
        ]);
        $image->title = $request->title;
        $image->description = $request->description;
        $image->user_id = Auth::user()->id;
        if($request->hasFile('image')) {
            $file = Input::file('image');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $image->filePath = $name;
            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        $returned_text=$this->tesseract($image->filePath);

        return view("imageupload")->with('success', $returned_text);
    }

    public function tesseract($image_path) {
        require_once 'D:\xampp\htdocs\ocr\vendor\thiagoalessio\tesseract_ocr\TesseractOCR\TesseractOCR.php';

        $tesseract = new TesseractOCR(public_path().'/images/'. $image_path);
        $text = $tesseract->recognize();
        Session::put('trans', $text);
        return $text;
    }

    public function bulgarian()
    {
        $tr = new TranslateClient('en', 'bg');
        $text = Session::get('trans');
        $trans = $tr->translate($text);
        return view("imageupload")->with(['success'=> $text, 'trans'=>$trans]);
    }

    public function russian()
    {
        $tr = new TranslateClient('en', 'ru');
        $text = Session::get('trans');
        $trans = $tr->translate($text);
        return view("imageupload")->with(['success'=> $text, 'trans'=>$trans]);
    }

    public function french()
    {
        $tr = new TranslateClient('en', 'fr');
        $text = Session::get('trans');
        $trans = $tr->translate($text);
        return view("imageupload")->with(['success'=> $text, 'trans'=>$trans]);
    }

    public function german()
    {
        $tr = new TranslateClient('en', 'de');
        $text = Session::get('trans');
        $trans = $tr->translate($text);
        return view("imageupload")->with(['success'=> $text, 'trans'=>$trans]);
    }

    public function spanish()
    {
        $tr = new TranslateClient('en', 'es');
        $text = Session::get('trans');
        $trans = $tr->translate($text);
        return view("imageupload")->with(['success'=> $text, 'trans'=>$trans]);
    }


    public function show(Request $request){
        $images = Image::all();
        return view('showLists')->with('images', $images);
    }
}
