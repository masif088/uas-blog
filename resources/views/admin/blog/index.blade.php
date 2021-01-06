@extends('layouts.admin-master')

@section('title','Blog Data')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.blog.create')}}" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">

        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <th scope="row">{{$blog->id}}</th>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->user->name}}</td>
                    <td>
                        @if($blog->status==0)
                        waiting
                        @elseif($blog->status==1)
                        accepted
                        @else
                        decline
                        @endif
                    </td>
                    <td>
                        <a href="{{route('blogShow',$blog->slug)}}" class="btn btn-primary">Show</a>
                        <a href="{{route('admin.blog.edit',$blog->id)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('admin.blog.destroy', $blog->id) }}" method="POST" style="display: inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection