<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogComment;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientSiteController extends Controller
{
    public function blogIndex(){
        $blogs= Blog::orderBy('created_at','desc')->whereStatus(1)->paginate(15);
        $blogOne=Blog::orderBy('created_at','desc')->whereStatus(1)->first();
        $blogTwo=Blog::orderBy('created_at','desc')->whereStatus(1)->skip(1)->take(2)->get();
        return view('client-site.index-blog',compact('blogs','blogOne','blogTwo'));
    }
    public function blogCategory($slug){
        $tag=Tag::whereTags($slug)->firstOrFail();
//        $tag=$tag->id;
        $blogs= Blog::orderBy('created_at','desc')->whereStatus(1)->whereTagId($tag->id)->paginate(15);
        $blogOne=Blog::orderBy('created_at','desc')->whereStatus(1)->first();
        $blogTwo=Blog::orderBy('created_at','desc')->whereStatus(1)->skip(1)->take(2)->get();
        return view('client-site.index-blog',compact('blogs','blogOne','blogTwo'));
    }
    public function blogSearchPost(Request $request){
        return redirect(route('blogSearch',$request->search_terms));
    }
    public function blogSearch($search){
        $blogs= Blog::orderBy('created_at','desc')->whereStatus(1)->where('title','LIKE',"%$search%")->orWhere('contents','LIKE',"%$search%")->paginate(15);
        $blogOne=Blog::orderBy('created_at','desc')->whereStatus(1)->first();
        $blogTwo=Blog::orderBy('created_at','desc')->whereStatus(1)->skip(1)->take(2)->get();
        return view('client-site.index-blog',compact('blogs','blogOne','blogTwo'));
    }
    public function blogShow($slug){
        $blog= Blog::whereSlug($slug)->whereStatus(1)->firstOrFail();
        $relates=Blog::whereTagId($blog->tag_id)->whereStatus(1)->orderBy('created_at','desc')->take(3)->get();
        $blog->update(['views'=>$blog->views+1]);
        return view('client-site.single-blog',compact('blog','relates'));
    }
    public function blogComment(Request $request, $slug){

        $data=$request->all();
        $blog= Blog::whereSlug($slug)->firstOrFail();
        if (Auth::check()){
            $data['user_id']=Auth::id();
        }
        $data['blog_id']=$blog->id;

        BlogComment::create($data);

        return redirect(route('blogShow',$slug));
    }
}
