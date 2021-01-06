@extends('layouts.admin-master')
@section('title')
    Create Tag
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
{{--                    <h4>Full Summernote</h4>--}}
                </div>
                <div class="card-body">
                    <form action="{{route('admin.tag.store')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title Tag</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="tags">
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
