@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Hotspots</h1>
    </div>
</div>

<div class="panel-body">
    <a href="/admin/hotspots/create" class="btn btn-success">Create</a>

    <table class="table table-hover ">
        <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($hotspots as $hotspot)
        <tr>
            <td>{{ $hotspot->name }}</td>
            <td>
                <a href="{{route('hotspots.edit', $hotspot->id) }}" class="btn btn-warning">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['hotspots.destroy', $hotspot->id], 'style' => 'display:inline']) !!}
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
