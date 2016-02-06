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
        // Redirect to image upload form
        return view('imageupload');
    }

    /**
     * Store a newly uploaded resource in storage.
     *
     * @return Response
     */
    public function store(Request $request){
        // Store records process
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
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $image->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        return $this->create()->with('success', 'Image Uploaded Successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function show(){
        // Show lists of the images
    }
}
