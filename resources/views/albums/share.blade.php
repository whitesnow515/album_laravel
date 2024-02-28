<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css" />
    <title>{{$album->name}}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <div id="app">
        <main class="p-5">
            <div class="justify-content-end">
                <h2>{{$album->name}}</h2>
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
        </main>
    </div>
</body>
</html>