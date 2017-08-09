@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Posts</h1>
    </div>
</div>

<div class="panel-body">
    <a href="/admin/posts/create" class="btn btn-success">Create</a>

    <table class="table table-hover ">
        <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>
                @if (!$post->files->isEmpty())
                <img width="100" src="/images/{{ $post->files{0}->filename }}" alt=""></td>
                @endif

            <td>{{ $post->title }}</td>
            <td class="col-sm-4">{{ $post->desc }}</td>
            <td>{{ $post->type }}</td>
            <td>
                <a href="{{route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id], 'style' => 'display:inline']) !!}
                {{ csrf_field() }}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
