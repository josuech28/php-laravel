@extends('layouts.master')

@section('header')
    <h2>List of Blogs!</h2>
@stop

@section('content')
    <a href="blog/create" class="btn btn-primary">Add new  Blog</a>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->description }}</td>
                <td>{{ $blog->created_at }}</td>
                <td>
                    <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method'=>'delete', 'route'=>['blog.destroy', $blog->id]]) !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger', 'onclick'=> 'return confirm("Do you want to delete blog?")']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
