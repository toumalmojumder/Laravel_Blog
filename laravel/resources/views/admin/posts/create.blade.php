@extends('layouts.app')

@section('content')

<div class="panel panel-default">
<div class="container">
<div class="row">
<div class="col-lg-12">
    <div class="panel-heading"><h1 class="display-4">Create a new post</h1></div>

    <div class="panel-body">
        <form action="/post/store" method=" post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input type="file" name="featured" class="form-control">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <div class="text-center"><button class="btn btn-success" type="submit">Store Post</button></div>
            </div>

        </form>
    </div>
    </div>
</div>
</div>
</div>


 
@stop