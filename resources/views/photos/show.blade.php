@extends('layouts.app')

@section('content')
<h2>{{$photo->title}}</h2>
<a class="btn btn-primary" href="/myalbum">Go back</a>
{!! Form::open(['url' => '/photos/' . $photo->id , 'method'=>'post', 'class'=>'float-right']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::bsSubmit('Delete',['class'=>'btn btn-danger']) }}
{!! Form::close() !!}

<div class="row">
    <div class="col-md-6">
    <img class="img img-fluid" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" />
    </div>
    <div class="col-md-6">
        <p> {{$photo->description}} </p>
    </div>
</div>
@endsection