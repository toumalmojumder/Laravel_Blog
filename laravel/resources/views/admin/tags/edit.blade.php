@extends('layouts.app')

@section('content')
@if(count($errors)>0)
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

<div class="panel-heading"><h1 class="display-4">Edit Tag : {{$tag->tag}}</h1></div>

    <div class="panel-body">
        <form action="{{route('tag.update' , ['id'=> $tag->id] )}}" method="post" >
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Tag</label>
            <input type="text" name="tag" value = "{{$tag->tag}}" class="form-control">
            </div>
            <div class="form-group">
              <div class="text-center"><button class="btn btn-success" type="submit">Update Tag</button></div>
            </div>
        </form>

</div> </div>
</div>




@stop
