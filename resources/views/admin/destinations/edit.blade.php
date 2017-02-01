@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Destinations</h1>
        </div>
    </div>

    <div class="panel-body">
        {!!
       Form::model($destination, ['route' => ['destinations.update', $destination->id],
      'method' => 'put',
      'class' => 'form-horizontal',
      'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Street', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('street', $destination->address->street , ['class' => 'form-control', 'placeholder' => 'Street']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Brgy', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('brgy', $destination->address->brgy , ['class' => 'form-control', 'placeholder' => 'Brgy']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'City', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('city', $destination->address->city , ['class' => 'form-control', 'placeholder' => 'City']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Province', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('province', $destination->address->province , ['class' => 'form-control', 'placeholder' => 'Province']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Region', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('region', $destination->address->region , ['class' => 'form-control', 'placeholder' => 'Region']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Guide', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::textarea('guide', $destination->guide , ['class' => 'form-control', 'placeholder' => 'Guide', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Content', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::textarea('content', $destination->content , ['class' => 'form-control', 'placeholder' => 'Content', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Rank', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('rank', $destination->rank , ['class' => 'form-control', 'placeholder' => 'Rank']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Image', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::file('files[]', null , ['class' => 'form-control', 'placeholder' => 'Content']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Activity', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::select('activity_id', $destination->activities, $destination->activity_id, ['class' => 'form-control']) !!}
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
