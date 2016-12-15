<?php

namespace App\Http\Controllers;

use App\Client;
use App\Member;
use App\News;
use App\Work;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

use App\Http\Requests;

class MainController extends Controller
{
    public $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    private function _getPage($page, $variables=[]){

        $agent = new Agent();
        $link = config('link.'.$page);
        $submenu = view('layout.submenu')
            ->with('link', $page)
            ->render();
        $isMobile = $agent->isMobile() ? true : false;
        return $this->request->isXmlHttpRequest() ?
            response()->json([
                'html' => view($page, array_merge([
                    'empty' => true,
                    'link' => $link,
                    'isMobile' => $isMobile,
                ], $variables))
                    ->render(),
                'link' => $link,
                'submenu' => $submenu
            ]) :
            view($page, array_merge([
                'empty' => false,
                'link' => $page,
                'isMobile' => $isMobile,
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

    public function getTeam(){
        $Members = Member::orderBy('order', 'ASC')->orderBy('id', 'DESC')->get();
        return $this->_getPage('team', [
            'Members' => $Members,
        ]);
    }

    public function getClients(){
        $Clients = Client::orderBy('order', 'ASC')->orderBy('id', 'DESC')->get();
        return $this->_getPage('clients', [
            'Clients' => $Clients,
        ]);
    }

    public function getPortfolio(){
        $Works = Work::with('mask')->orderBy('order', 'ASC')->orderBy('id', 'DESC')->get()->toArray();
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
        $News = News::with('tags')->orderBy('id', 'DESC')->get();
        return $this->_getPage('news', [
            'News' => $News,
        ]);
    }

    public function getContacts(){
        return $this->_getPage('contacts');
    }
}
