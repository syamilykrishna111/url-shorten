<?php

namespace App\Http\Controllers\URL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\URLShort;

class UrlController extends Controller
{
    public function short(Request $request) {
    	$url = URLShort::whereUrl($request->url)->first();
    	if($url == null){
    		$short = $this->generateShortURL();
    		URLShort::create([
    			'url' => $request->url,
    			'short' => $short,
    		]);
    		$url = URLShort::where('url',$request->url)->first();
    		return view('url.short_url', compact('url'));

    	}else{

    	}
    }
    public function generateShortURL() {
    	$result = base_convert( rand(1000,99999),10,36);
    	$data = URLShort::whereShort($result)->first();
    	if($data !=null) {
    		$this->generateShortURL();
    	} 
    	return $result;
    }
    public function shortLink($link){
    	$url = URLShort::whereShort($link)->first();
    	return redirect($url->url);

    }
}
