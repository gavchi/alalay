<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    private function _getPage($page, $variables=[]){
        $link = config('link.'.$page);
        $submenu = view('layout.submenu')
            ->with('link', $page)
            ->render();
        return $this->request->isXmlHttpRequest() ?
            response()->json([
                'html' => view($page, array_merge([
                    'empty' => true,
                    'link' => $link,
                ], $variables))
                    ->render(),
                'link' => $link,
                'submenu' => $submenu
            ]) :
            view($page, array_merge([
                'empty' => false,
                'link' => $page,
            ], $variables));
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
        $Works = Work::all()->toArray();
        $firstItems = array_slice($Works, 0, count($Works)/2);
        $secondItems = array_slice($Works, count($Works)/2 + 1);
        return $this->_getPage('portfolio',[
            'firstItems' => $firstItems,
            'secondItems' => $secondItems,
        ]);
    }

    public function getProject($id){
        $Work = Work::find($id);
        return $this->_getPage('project',[
            'Work' => $Work
        ]);
    }

    public function getNews(){
        return $this->_getPage('news');
    }

    public function getContacts(){
        return $this->_getPage('contacts');
    }
}
