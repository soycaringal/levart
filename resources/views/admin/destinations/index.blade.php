@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Destinations</h1>
    </div>
</div>

<div class="panel-body">
    <a href="/admin/destinations/create" class="btn btn-success">Create</a>

    <table class="table table-hover ">
        <thead>
        <tr>
            <th>Image</th>
            <th>Guide</th>
            <th>Content</th>
            <th>Rank</th>
            <th>Address</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($destinations as $destination)
        <tr>
            <td></td>
            <td>{{ $destination->guide }}</td>
            <td class="col-sm-4">{{ $destination->content }}</td>
            <td>{{ $destination->rank }}</td>
            <td>
                {{ $destination->address->street }},
                {{ $destination->address->brgy }},
                {{ $destination->address->city }},
                {{ $destination->address->province }},
                {{ $destination->address->region }}
            </td>
            <td>
                <a href="{{route('destinations.edit', $destination->id) }}" class="btn btn-warning">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['destinations.destroy', $destination->id], 'style' => 'display:inline']) !!}
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
