<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">My Albums</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item {{Request::is('/')?'active':''}} ">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item {{Request::is('albums/create')?'active':''}}">
            <a class="nav-link" href="/albums/create">Create Album</a>
        </li>
    </div>
</nav>