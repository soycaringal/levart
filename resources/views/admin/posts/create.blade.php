@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Posts</h1>
        </div>
    </div>

    <div class="panel-body">
        {!! Form::open([
        'action' => 'PostsController@store',
        'method' => 'post',
        'class' => 'form-horizontal',
        'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('title', null , ['class' => 'form-control', 'placeholder' => 'Title']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Description', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::textarea('desc', null , ['class' => 'form-control', 'placeholder' => 'Description', 'required' => 'required']) !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('title', 'Type', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                <select class="form-control" name="type">
                    <option value="News">News</option>
                    <option value="Announcement">Announcement</option>
                    <option value="Post">Post</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Image', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::file('files[]', null , ['class' => 'form-control', 'placeholder' => 'Content']) !!}
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
