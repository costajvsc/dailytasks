<nav class="navbar navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <img src="{{asset('images/logo.png')}}" class="img-thumbnail" alt="Logo Dailytasks" style="max-height: 75px; border: none">
    <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Daily</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/tasks">Tasks<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/week">Week</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </div>
</nav>
