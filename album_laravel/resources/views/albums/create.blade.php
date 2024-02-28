@extends('layouts.app')

@section('content')
<h3>Create Album</h3>

{!! Form::open(['action' => 'AlbumsController@store','method'=>'POST', 'files' => true]) !!}
    {{Form::bsText('name','',['placeholder'=>'Album Name'])}}
    {{Form::bsTextArea('description','',['placeholder'=>'Album Description'])}}
    {{Form::bsFile('cover_image')}}
    {{Form::bsSubmit('Save',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection