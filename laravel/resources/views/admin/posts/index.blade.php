@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
                <tbody>
                    @foreach ($posts as $post)
                <tr>
                <td>{{ $post->featured }}</td>
                    <td>{{$post->title}}</td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
                    @endforeach
                </tbody>
        </table>

    </div>
</div>

@stop
