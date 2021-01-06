<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::user()->role == 1) {
            $blogs = Blog::orderBy('status')->orderBy('created_at', 'desc')->get();
        } else {
            $blogs = Blog::orderBy('status')->orderBy('created_at', 'desc')->whereUserId(Auth::id())->get();
        }
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::get();
        return view('admin.blog.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $data = $request->validate([
            'title' => 'required|max:255',
            'contents' => 'required',
            'tag_id' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',

        ]);
        if (Auth::user()->role == 1) {
            $data['status'] = $request->status;
        }
        $data['thumbnail'] = date('dmyHis') . '.' . $request->file('file')->extension();
        Storage::putFileAs('public/blog', $request->file('file'), $data['thumbnail']);
        unset($data['file']);
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title']);

        Blog::create($data);

        return redirect(route('admin.blog.index'))->with('status', 'Success entry new data!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $tags = Tag::get();
        return view('admin.blog.edit', compact('blog', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'contents' => 'required',
            'tag_id' => 'required',

        ]);
        if ($request->file('file')) {
            $request->validate([
                'file' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            ]);
            $data['thumbnail'] = date('dmyHis') . '.' . $request->file('file')->extension();
            Storage::putFileAs('public/blog', $request->file('file'), $data['thumbnail']);
            unset($data['file']);
        }
        if (Auth::user()->role == 1) {
            $data['status'] = $request->status;
        } else {
            $data['status'] = 0;
        }

//        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title']);

        Blog::find($id)->update($data);

        return redirect(route('admin.blog.index'))->with('status', 'Success edit data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return redirect(route('admin.blog.index'))->with('status', 'Success delete  data!');
    }
}
