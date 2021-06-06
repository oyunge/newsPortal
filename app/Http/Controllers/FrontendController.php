<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Writer;
use App\Models\User;
use App\Models\Advertise;
use App\Models\Event;
use App\Models\Setting;
use App\Models\Video;

class FrontendController extends Controller
{
    public function uploadImage($image, $dir)
    {
        $image_name = $image->getClientOriginalName();
        $new_name = time().$image_name;
        $image->move($dir, $new_name);
        return $new_name;
    }
    public function welcome()
    {
        $categories = Category::latest()->get();
        $videos = Video::latest()->get();
        $latest_breaking_news = Post::where('breaking', 1)->latest()->first();
        $breaking_news =Post::where('breaking', 1)->latest()->get();
        $latest_news =Post::latest()->take(3)->get();
        $latest_videos = Video::latest()->take(10)->get();
        return view('welcome', compact('categories', 'latest_breaking_news', 'latest_videos', 'breaking_news', 'latest_news', 'videos'));
    }

    public function ckUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $dir = "storage/ckuploads/";
            $filenametostore= $this->uploadImage($request->file('upload'), $dir);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/ckuploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function post($id)
    {
        $post = Post::find($id);
        $post->increment('views', 1);
        return view('client.post', compact('post'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        $title = $category->title;
        $latest_news = $category->posts()->latest()->take(5)->get();
        $all_news = $category->posts()->paginate(10);
        $trending = $category->posts()->orderBy('views', 'desc')->take(5)->get();
    

        return view('client.category-posts', compact('category', 'latest_news', 'all_news', 'title', 'trending'));
    }

    public function writeForm()
    {
        return view('client.become-writer');
    }
    public function writeForUs(Request $request)
    {
        $requent_sent = Writer::where('user_id', auth()->id())->first();
        if ($requent_sent) {
            toastr()->error('Request already sent! Please wait for admin approval');
            return back();
        }
        Writer::create($request->all());
        toastr()->success('Request saved successfully, we will call you for more information');
        return back();
    }
    public function contactForm()
    {
    }
    public function contactUs()
    {
    }
    public function advertiseForm()
    {
        return view('client.advertise');
    }
    public function advertise(Request $request)
    {
        $requent_sent = Advertise::where('user_id', auth()->id())->first();
        if ($requent_sent) {
            toastr()->error('Request already sent! Please wait for admin approval');
            return back();
        }
        Advertise::create($request->all());
        toastr()->success('Request saved successfully, we will call you for more information');
        return back();
    }
    public function about()
    {
        $about = Setting::latest()->first();
        return view('client.about', compact('about'));
    }
    public function clientEvents()
    {
        $events = Event::latest()->paginate(10);
        return view('client.events', compact('events'));
    }
}
