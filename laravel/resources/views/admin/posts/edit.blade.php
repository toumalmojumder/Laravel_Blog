@extends('layouts.app')

@section('content')

        @if( count($errors)>0 )
            <ul class="list-group">
@foreach($errors->all() as $error)
<li class="list-group-item text-danger">
{{$error}}
</li>
@endforeach
</ul>
@endif
<div class="panel panel-default">
<div class="card-body">

<div class="panel-heading"><h1 class="display-4">Edit Post:{{$post->title}}</h1></div>

    <div class="panel-body">
        <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input type="file" name="featured" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Select a Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">
                            {{$category->name}}

                        </option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
            </div>
            <div class="form-group">
              <div class="text-center"><button class="btn btn-success" type="submit">Update Post</button></div>
            </div>
        </form>
</div> </div>
</div>
@stop
