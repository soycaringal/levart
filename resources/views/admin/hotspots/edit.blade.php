@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Hotspots</h1>
        </div>
    </div>

    <div class="panel-body">
        {!!
        Form::model($hotspot, ['route' => ['hotspots.update', $hotspot->id],
       'method' => 'put',
       'class' => 'form-horizontal',
       'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Street', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('street', $hotspot->address->street , ['class' => 'form-control', 'placeholder' => 'Street']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Brgy', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('brgy', $hotspot->address->brgy , ['class' => 'form-control', 'placeholder' => 'Brgy']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'City', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('city', $hotspot->address->city , ['class' => 'form-control', 'placeholder' => 'City']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Province', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('province', $hotspot->address->province , ['class' => 'form-control', 'placeholder' => 'Province']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Region', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('region', $hotspot->address->region , ['class' => 'form-control', 'placeholder' => 'Region']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Hotspot Name', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('name', $hotspot->name , ['class' => 'form-control', 'placeholder' => 'Name', 'required' => 'required']) !!}
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
