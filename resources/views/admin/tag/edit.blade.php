

@extends('layouts.admin-master')
@section('title')
    Edit Tag
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{--                    <h4>Full Summernote</h4>--}}
                </div>
                <div class="card-body">
                    <form action="{{route('admin.tag.update',$tag->id)}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title Tag</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="tags" value="{{$tag->tags}}">
                            </div>
                        </div>

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
