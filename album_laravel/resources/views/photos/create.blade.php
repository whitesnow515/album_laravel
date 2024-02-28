@extends('layouts.app')

@section('content')
<h3>Upload Photo</h3>

{{-- {!! Form::open(['url' => '/photos/store','method'=>'POST', 'files' => true]) !!}
    {{Form::bsText('title','',['placeholder'=>'Photo title'])}}
    {{Form::bsTextArea('description','',['placeholder'=>'Album Description'])}}
    {{Form::hidden('album_id',$albumId)}}
    {{Form::bsFile('photo')}}
    {{Form::bsSubmit('Upload',['class'=>'btn btn-primary'])}}
{!! Form::close() !!} --}}

<form class="dropzone" style="margin: auto; display: block;" id="dropzone-default" action="/photos/store" method="POST" autocomplete="off" enctype="multipart/form-data" novalidate>
    @csrf
    <input name="file" type="file" multiple hidden />
    <div class="dz-message">
        <img src="/assets/images/drop.png" id="submitImage" style="height: 90px; margin: auto; display: block;">   
    </div>
    <input type="hidden" id="album_id" name="album_id" value="{{ $albumId }}"  alt="Submit"/>
</form>
<button onclick="document.getElementById('dropzone-default').submit()" type="button" class="btn  btn-primary" style="margin: auto; display: block;" >Upload</button>
  <link href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/dropzone/dist/dropzone-min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        new Dropzone("#dropzone-default")
    })
</script>
@endsection