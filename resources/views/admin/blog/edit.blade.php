@extends('layouts.admin-master')
@section('title')
Edit Blog
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <h4>Full Summernote</h4>--}}
            </div>
            <div class="card-body">
                <form action="{{route('admin.blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="title" value="{{$blog->title}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" name="tag_id">
                                @foreach($tags as $tag)
                                <option value="{{$tag->id}}" {{$blog->tag_id==$tag->id?'selected':''}}>{{$tag->tags}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote" name="contents">{!! $blog->contents !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="file" class="form-control" name="file">
                            <img src="{{asset('storage/blog/'.$blog->thumbnail)}}" class="img-thumbnail" alt="">
                        </div>
                    </div>
                    @if(Auth::user()->role==1)
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" name="status">
                                <option value="0" {{$blog->status==0?'selected':''}}>Waiting</option>
                                <option value="1" {{$blog->status==1?'selected':''}}>Accepted</option>
                                <option value="2" {{$blog->status==2?'selected':''}}>Decline</option>
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary">Publish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection