<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


class ApplyController extends Controller {

  public function upload(Request $request) {

    $file = $request->file('image');
    echo "<pre>";
    print_r($file);

    if($request->file('image')->isValid()){

//      $request->file('image')->move('uploadsxx','test.png');

    }
    
  }

}