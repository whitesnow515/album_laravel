@extends('layouts.app')

@section('content')    

<form id="share_form">
	@csrf
	<input type="hidden" name="album_id" id="album_id"/>
	<input type="hidden" name="crypted_id" id="crypted_id"/>
</form>

<div class="d-flex justify-content-between m-3">
	<h2>Album List</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_album_modal" style="width: 92px">Add</button>
</div>

<div class="row">
    @if(count($albums) > 0)
        @foreach($albums as $album)
			<div class="col-md-6 col-lg-3 mb-2">
				<div class="carousel-item active">
					<div class="container">
						<div class="">                      
							<div class="card">
								<img
									onclick="window.location.href='albums/{{$album->id}}'"
									src="/storage/album_covers/{{$album->cover_image}}"
									class="card-img-top"
									style="height: 250px"
								/>
								<div class="card-body">
									<h5 class="card-title">{{$album->name}}</h5>
									<div class="text1" style="min-height: 42px;">
										{{$album->description}}
									</div>
									<div class="d-flex justify-content-end">
										<a href="albums/{{$album->id}}">
											<img src="assets/images/card/more.png" style="height: 30px; margin: 8px;" />
										</a>
										<a data-toggle="modal" data-target="#copy_share_modal">
											<img src="assets/images/card/share.png" style="height: 30px; margin: 10px;" onclick="share({{$album->id}})"/>
										</a>
										<a href="albums/delete/{{$album->id}}">
											<img src="assets/images/card/delete.png" style="height: 30px; margin: 10px;" />
										</a>
									</div>
									<p class="card-text">
										<small class="text-muted">{{$album->name}}</small>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        @endforeach
    @endif
</div>

<div id="create_album_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Create Album</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				{!! Form::open(['action' => 'AlbumsController@store','method'=>'POST', 'files' => true, 'id' => 'myForm']) !!}
					{{Form::bsText('name','',['placeholder'=>'Album Name'])}}
					{{Form::bsTextArea('description','',['placeholder'=>'Album Description'])}}
					{{Form::bsFile('cover_image')}}
					<input type="hidden" id="user_id" value="{{ Auth::user()->id }}" name="user_id" />
					{{-- {{Form::bsSubmit('Save',['class'=>'btn btn-primary'])}} --}}
				{!! Form::close() !!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn  btn-primary" onclick="document.getElementById('myForm').submit()">Upload</button>
			</div>
		</div>
	</div>
</div>

<div id="copy_share_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<input type="text" id="sharelink" class="form-control" name="sharelink" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	
	function share(albumId) {

		var result = '';
		var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		var charactersLength = characters.length;
		for (var i =  0; i < 10; i++) {
			result += characters.charAt(Math.floor(Math.random() * charactersLength));
		}

		var crypted_album_id = result + albumId;
		album_id.value = albumId;
		crypted_id.value = crypted_album_id;
		
		$.ajax({
			url: '/album/share/create',
			method: 'POST',
			data: $('#share_form').serialize(),
			dataType: 'text',
			success: function(response) {
				if(response == "success") {
					setClipboard(crypted_album_id);
				}
			},
			error: function(xhr, status, error) {
				// console.error('Error:', error);
			}
		});
	}

	function setClipboard(crypted_album_id){

		// var textarea = document.createElement("textarea");
		// textarea.value = "{{ env('API_URL') }}/album/share/" + crypted_album_id;
		document.getElementById("sharelink").value = "{{ env('API_URL') }}/album/share/" + crypted_album_id;
		// $('#copy_share_modal').modal('show');
		// document.body.appendChild(textarea);
		// textarea.select();
		// document.execCommand("copy");
      	// document.body.removeChild(textarea);
		// alert("Copied Link to Clipboard for sharing");
	}

</script>

@endsection