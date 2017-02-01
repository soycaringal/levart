@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Activities</h1>
        </div>
    </div>

    <div class="panel-body">
        {!! Form::open([
        'action' => 'ActivitiesController@store',
        'method' => 'post',
        'class' => 'form-horizontal']) !!}

        <div class="form-group">
            {!! Form::label('title', 'Activity Name', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('name', null , ['class' => 'form-control', 'placeholder' => 'Name', 'required' => 'required']) !!}
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
