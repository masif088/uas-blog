
@extends('layouts.admin-master')

@section('title','Blog Data')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.tag.create')}}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">

            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Popularity</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags->sortBy(function ($q){$q->blogs->count();}) as $tag)
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->tags}}</td>
                        <td>{{$tag->blogs->count()}}</td>
                        <td>
                            <a href="{{route('blogCategory',$tag->tags)}}" class="btn btn-primary">Show</a>
                            <a href="{{route('admin.tag.edit',$tag->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('admin.tag.destroy', $tag->id) }}" method="POST" style="display: inline">
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
