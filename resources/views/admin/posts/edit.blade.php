@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Posts</h1>
        </div>
    </div>

    <div class="panel-body">
        {!!
       Form::model($post, ['route' => ['posts.update', $post->id],
      'method' => 'put',
      'class' => 'form-horizontal',
      'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('title', $post->title , ['class' => 'form-control', 'placeholder' => 'Title']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Description', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::textarea('desc', $post->desc , ['class' => 'form-control', 'placeholder' => 'Description', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Type', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('type', $post->type , ['class' => 'form-control', 'placeholder' => 'Type']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Images', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">

                {!! Form::file('files[]', ['class' => 'form-control', 'placeholder' => 'Content', 'multiple' => 'true']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6">
                @foreach ($post->files as $file)
                    <img width="100" src="/images/{{ $file->filename }}" alt=""></td>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-9 pull-right">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {{ csrf_field() }}
        {!! Form::close() !!}
    </div>
@endsection
