<?php

namespace App\Http\Controllers;

use App\Client;
use App\Mask;
use App\Member;
use App\News;
use App\Seo;
use App\Tag;
use App\Work;
use Image;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Create a new admin controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){
        return view('admin.index');
    }

    /*
     * Clients
     * */
    public function getClients(){
        $Clients = Client::orderBy('order', 'ASC')->orderBy('id', 'DESC')->get();
        return view('admin.clients')
            ->with('Clients', $Clients);
    }

    public function getAddClient(){
        return view('admin.form.client');
    }

    public function getEditClient($id){
        $Client = Client::find($id);
        return view('admin.form.client')
            ->with('Client', $Client);
    }

    public function anyOrderClients(Request $request){
        $order = $request->get('order');
        $Clients = Client::orderBy('order', 'ASC')->orderBy('id', 'DESC')->get();
        foreach($order as $key => $id){
            $Clients->find($id)->update(['order' => $key]);
        }
        return response()->json(['success' => true]);
    }

    public function postEditClient(Request $request, $id = null){
        $rules = [
            'title' => 'required|max:255'
        ];
        if(is_null($id)){
            $rules = array_merge($rules, [
                'image' => 'required|image|mimes:jpeg,jpg,gif,png|max:5120',
            ]);
        }else{
            $rules = array_merge($rules, [
                'image' => 'image|mimes:jpeg,jpg,gif,png|max:5120',
            ]);
        }
        $this->validate($request, $rules);
        if($id){
            $Client = Client::findOrfail($id);
        }else{
            $Client = new Client();
        }

        /*Image*/
        $tempFile = $request->file('image');
        if(!is_null($tempFile)){
            $Image = Image::make($request->file('image'));
            $imageName = str_random(8).'.'.$tempFile->getClientOriginalExtension();

            if(500 < $Image->width()){
                $Image->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $Image->save(public_path(config('image.path.client')).$imageName, 100);
            if(!is_null($id)){
                unlink(public_path(config('image.path.client')).$Client->image);
            }
            $Client->image = $imageName;
        }

        $Client->title = $request->get('title');
        $Client->save();
        return redirect()->action('AdminController@getClients');
    }

    public function getDeleteClient($id){
        $Client = Client::find($id);
        if($Client){
            unlink(public_path(config('image.path.client')).$Client->image);
            $Client->delete();
        }
        return redirect()->action('AdminController@getClients');
    }

    /*
     * Works
     * */
    public function getWorks(){
        $Works = Work::orderBy('order', 'ASC')->orderBy('id', 'DESC')->get();
        return view('admin.works')
            ->with('Works', $Works);
    }

    public function getAddWork(){
        $Masks = Mask::all();
        return view('admin.form.work')
            ->with('Masks', $Masks);
    }

    public function getEditWork($id){
        $Work = Work::with('mask')->find($id);
        $Masks = Mask::all();
        return view('admin.form.work')
            ->with('Work', $Work)
            ->with('Masks', $Masks);
    }

    public function anyOrderWorks(Request $request){
        $order = $request->get('order');
        $Works = Work::orderBy('order', 'ASC')->orderBy('id', 'DESC')->get();
        foreach($order as $key => $id){
            $Works->find($id)->update(['order' => $key]);
        }
        return response()->json(['success' => true]);
    }

    public function postEditWork(Request $request, $id = null){
        $rules = [
            'title' => 'required|max:255',
            'work_type' => 'required|max:255',
            'description' => 'required',
            'mask' => 'required'
        ];
        if(is_null($id)){
            $rules = array_merge($rules, [
                'logo' => 'required|image|mimes:jpeg,jpg,gif,png|max:5120',
                'image' => 'required|image|mimes:jpeg,jpg,gif,png|max:5120',
            ]);
        }else{
            $rules = array_merge($rules, [
                'logo' => 'image|mimes:jpeg,jpg,gif,png|max:5120',
                'image' => 'image|mimes:jpeg,jpg,gif,png|max:5120',
            ]);
        }
        $this->validate($request, $rules);
        if($id){
            $Work = Work::findOrfail($id);
        }else{
            $Work = new Work();
        }

        /*Image*/
        $tempFile = $request->file('image');
        if(!is_null($tempFile)){
            $Image = Image::make($request->file('image'));
            $imageName = str_random(8).'.'.$tempFile->getClientOriginalExtension();

            if(500 < $Image->width()){
                $Image->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $Image->save(public_path(config('image.path.work.main')).$imageName, 100);
            if(!is_null($id)){
                unlink(public_path(config('image.path.work.main')).$Work->image);
            }
            $Work->image = $imageName;
        }

        /*Logo*/
        $tempFile = $request->file('logo');
        if(!is_null($tempFile)){
            $Image = Image::make($request->file('logo'));
            $logoName = str_random(8).'.'.$tempFile->getClientOriginalExtension();

            if(800 < $Image->width()){
                $Image->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $Image->save(public_path(config('image.path.work.logo')).$logoName, 100);
            if(!is_null($id)){
                unlink(public_path(config('image.path.work.logo')).$Work->logo);
            }
            $Work->logo = $logoName;
        }

        $Work->title = $request->get('title');
        $Work->work_type = $request->get('work_type');
        $Work->description = $request->get('description');
        $Work->save();

        $Mask = Mask::find($request->get('mask'));
        $Work->mask()->associate($Mask);
        $Work->save();
        return redirect()->action('AdminController@getWorks');
    }

    public function getDeleteWork($id){
        $Work = Work::find($id);
        if($Work){
            unlink(public_path(config('image.path.work.main')).$Work->image);
            unlink(public_path(config('image.path.work.logo')).$Work->logo);
            $Work->delete();
        }
        return redirect()->action('AdminController@getWorks');
    }

    /*
     * News
     * */
    public function getNews(){
        $News = News::with('tags')->paginate();
        return view('admin.news')
            ->with('News', $News);
    }
    public function anyTags(Request $request){
        $query = $request->get('query');
        $Tags = Tag::where('name', 'like', '%'.$query.'%' )->get();
        $result = [];
        foreach($Tags as $Tag){
            $result[] = [
                'data' => (string)$Tag->id,
                'value' => $Tag->name,
            ];
        }
        return response()->json(['suggestions' => $result]);
    }

    public function getAddNews(){
        return view('admin.form.news');
    }

    public function getEditNews($id){
        $News = News::find($id);
        return view('admin.form.news')
            ->with('News', $News);
    }

    public function postEditNews(Request $request, $id = null){
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,jpg,gif,png|max:5120',
        ];
        $this->validate($request, $rules);
        if($id){
            $News = News::findOrfail($id);
        }else{
            $News = new News();
        }

        /*Image*/
        $tempFile = $request->file('image');
        if(!is_null($tempFile)){
            $Image = Image::make($request->file('image'));
            $imageName = str_random(8).'.'.$tempFile->getClientOriginalExtension();

            if(700 < $Image->width()){
                $Image->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $Image->save(public_path(config('image.path.news')).$imageName, 100);
            if(!is_null($id)){
                unlink(public_path(config('image.path.news')).$News->image);
            }
            $News->image = $imageName;
        }

        $News->title = $request->get('title');
        $News->description = $request->get('description');
        $News->save();

        /*Tags*/
        $newTags = explode(',', $request->get('tags'));
        $existedTags = [];
        $ExistedTags = Tag::whereIn('name', $newTags)->get();
        foreach($ExistedTags as $Tag){
            $existedTags[] = $Tag->id;
            foreach($newTags as $key => $value){
                if($value === $Tag->name){
                    unset($newTags[$key]);
                }
            }
        }
        foreach($newTags as $newTag){
            $Tag = new Tag();
            $Tag->name = $newTag;
            $Tag->save();
            $existedTags[] = $Tag->id;
        }
        $News->tags()->sync($existedTags);

        return redirect()->action('AdminController@getNews');
    }

    public function getDeleteNews($id){
        $News = News::find($id);
        if($News){
            unlink(public_path(config('image.path.news')).$News->image);
            $News->delete();
        }
        return redirect()->action('AdminController@getNews');
    }

    /*
     * Memebers
     * */
    public function getMembers(){
        $Members = Member::orderBy('order', 'ASC')->orderBy('id', 'DESC')->get();
        return view('admin.members')
            ->with('Members', $Members);
        return view('admin.members');
    }

    public function getAddMember(){
        return view('admin.form.member');
    }

    public function getEditMember($id){
        $Member = Member::find($id);
        return view('admin.form.member')
            ->with('Member', $Member);
    }

    public function anyOrderMembers(Request $request){
        $order = $request->get('order');
        $Members = Member::orderBy('order', 'ASC')->orderBy('id', 'DESC')->get();
        foreach($order as $key => $id){
            $Members->find($id)->update(['order' => $key]);
        }
        return response()->json(['success' => true]);
    }

    public function postEditMember(Request $request, $id = null){
        $rules = [
            'name' => 'required|max:255',
            'post' => 'required|max:255'
        ];
        if(is_null($id)){
            $rules = array_merge($rules, [
                'image' => 'required|image|mimes:jpeg,jpg,gif,png|max:5120',
            ]);
        }else{
            $rules = array_merge($rules, [
                'image' => 'image|mimes:jpeg,jpg,gif,png|max:5120',
            ]);
        }
        $this->validate($request, $rules);
        if($id){
            $Member = Member::findOrfail($id);
        }else{
            $Member = new Member();
        }

        /*Image*/
        $tempFile = $request->file('image');
        if(!is_null($tempFile)){
            $Image = Image::make($request->file('image'));
            $imageName = str_random(8).'.'.$tempFile->getClientOriginalExtension();

            if(500 < $Image->width()){
                $Image->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $Image->save(public_path(config('image.path.member')).$imageName, 100);
            if(!is_null($id)){
                unlink(public_path(config('image.path.member')).$Member->image);
            }
            $Member->image = $imageName;
        }

        $Member->name = $request->get('name');
        $Member->post = $request->get('post');
        $Member->save();

        return redirect()->action('AdminController@getMembers');
    }

    public function getDeleteMember($id){
        $Member = Member::find($id);
        if($Member){
            unlink(public_path(config('image.path.member')).$Member->image);
            $Member->delete();
        }
        return redirect()->action('AdminController@getMembers');
    }

    /*
     * SEO
     * */
    public function getSeo(){
        $Seo = Seo::orderBy('url', 'ASC')->paginate();
        return view('admin.seo')
            ->with('Seo', $Seo);
    }

    public function getAddSeo(){
        return view('admin.form.seo');
    }

    public function getEditSeo($id){
        $Seo = Seo::find($id);
        return view('admin.form.seo')
            ->with('Seo', $Seo);
    }

    public function postEditSeo(Request $request, $id = null){
        $rules = [
            'url' => 'max:255',
        ];
        $this->validate($request, $rules);
        if($id){
            $Seo = Seo::findOrfail($id);
        }else{
            $Seo = new Seo();
        }

        $Seo->url = $request->get('url');
        $Seo->title = $request->get('title');
        $Seo->keywords = $request->get('keywords');
        $Seo->description = $request->get('description');
        $Seo->robots = $request->get('robots');
        $Seo->copyright = $request->get('copyright');
        $Seo->save();

        return redirect()->action('AdminController@getSeo');
    }

    public function getDeleteSeo($id){
        $Seo = Seo::find($id);
        if($Seo){
            $Seo->delete();
        }
        return redirect()->action('AdminController@getSeo');
    }
}
