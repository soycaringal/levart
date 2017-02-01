@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Activities</h1>
    </div>
</div>

<div class="panel-body">
    <a href="/admin/activities/create" class="btn btn-success">Create</a>

    <table class="table table-hover ">
        <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($activities as $activity)
        <tr>
            <td>{{ $activity->name }}</td>
            <td>
                <a href="{{route('activities.edit', $activity->id) }}" class="btn btn-warning">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['activities.destroy', $activity->id], 'style' => 'display:inline']) !!}
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
