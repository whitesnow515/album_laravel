@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between">
    <h2>{{$album->name}}</h2>
    <div>
        {{-- <a class="btn btn-primary" href="/myalbum">Go back</a> --}}
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal" style="width: 92px">Add</button>
    </div>
</div>

<hr>
<div class="row">
    {{-- showing album photos --}}
    @if(count($album->photos) > 0)
        @foreach($album->photos as $photo)
        <div class="col-md-6 col-lg-2 mb-2">
            <img class="img img-fluid" style="height: 300px; width: 450px" src="/storage/photos/{{$album->id}}/{{$photo->title}}" alt="{{$photo->title}}" />
        </div>
        @endforeach
    @endif
</div>
<hr>

<div id="uploadModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Upload files</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="dropzone" style="margin: auto; display: block;" id="dropzone-default" action="/photos/store" method="POST" autocomplete="off" enctype="multipart/form-data" novalidate>
                    @csrf
                    <input name="file" type="file" multiple hidden />
                    <div class="dz-message">
                        <img src="/assets/images/drop.png" id="submitImage" style="height: 90px; margin: auto; display: block;" >   
                    </div>
                    <input type="hidden" id="album_id" name="album_id" value="{{$album->id}}"  alt="Submit"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-primary" onclick="document.getElementById('dropzone-default').submit()">Upload</button>
            </div>
        </div>
    </div>
</div>

@endsection