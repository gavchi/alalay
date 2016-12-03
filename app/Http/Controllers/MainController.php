<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    private function _getPage($page){
        $link = config('link.'.$page);
        $submenu = view('layout.submenu')
            ->with('link', $page)
            ->render();
        return $this->request->isXmlHttpRequest() ?
            response()->json([
                'html' => view($page)
                    ->with('empty', true)
                    ->with('link', $link)
                    ->render(),
                'link' => $link,
                'submenu' => $submenu
            ]) :
            view($page)
                ->with('empty', false)
                ->with('link', $page);
    }
/*
    public function anyLoad(Request $request, $page){
        $currentUrl = action('MainController@anyLoad', $page);
        if ($request->isXmlHttpRequest()){
            $html = view($page)
                ->with('currentUrl', $currentUrl)
                ->with('empty', true)
                ->render();
            return $html;
        }else{
            return view($page)
                ->with('currentUrl', $currentUrl)
                ->with('empty', false);
        }
    }*/

    public function getIndex(){
        return $this->_getPage('index');
    }

    public function getAbout(){
        return $this->_getPage('about');
    }

    public function getCommand(){
        return $this->_getPage('command');
    }

    public function getClients(){
        return $this->_getPage('clients');
    }

    public function getPortfolio(){
        return $this->_getPage('portfolio');
    }

    public function getProject(){
        return $this->_getPage('project');
    }

    public function getNews(){
        return $this->_getPage('news');
    }

    public function getContacts(){
        return $this->_getPage('contacts');
    }
}
