<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TesseractOCR;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TesseractController extends Controller
{
    public function index()
    {
//        echo "hello";
//        exec("tesseract.exe test.jpg neshto");
//        echo " it's me";
        // return view('home');


        require_once 'D:\xampp\htdocs\ocr\vendor\thiagoalessio\tesseract_ocr\TesseractOCR\TesseractOCR.php';
        $tesseract = new TesseractOCR('test.jpg');
        $tesseract->setTempDir('D:\xampp\htdocs\ocr\my-temp-dir');
        //$tesseract->setTempDir('.\my-temp-dir');
        $text = $tesseract->recognize();
        echo PHP_EOL, "The recognized text is:", $text, PHP_EOL;
    }
}
