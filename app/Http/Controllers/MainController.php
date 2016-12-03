<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public function anyLoad(Request $request, $page){
        $currentUrl = action('MainController@anyLoad', $page);
        if ($request->isMethod('post')){
            $html = view($page)
                ->with('currentUrl', $currentUrl)
                ->with('isJSON', true)
                ->render();
            return response()->json(['status' => true, 'html' => $html]);
        }else{
            return view($page)
                ->with('currentUrl', $currentUrl)
                ->with('isJSON', false);
        }
    }

    public function getIndex(){
        return view('index');
    }

    public function getAbout(){
        return view('about');
    }

    public function getPortfolio(){
        return view('portfolio');
    }

    public function getNews(){
        return view('news');
    }

    public function getContacts(){
        return view('contacts');
    }
}
