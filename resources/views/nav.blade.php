<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">{{env('APP_NAME')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        @if(!auth()->guest())
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/activities')}}">Activities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/students')}}">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/semesters')}}">Semesters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/qrcodes')}}">QRCode</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      User: {{auth()->user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="{{url('/change-password')}}">Change Password</a>
                      <hr>
                      <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
        @endif
    </div>

</nav>
