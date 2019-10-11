<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}">{{env('APP_NAME')}}</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/students')}}">Students</a></li>
            <li><a href="{{url('/activities')}}">Activities</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reports <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/reports/individual">Individual Summary</a></li>
                    <li><a href="/reports/activity">Activity Summary</a></li>
                    <li><a href="/reports/semestral">Semestral Report</a></li>
                    <li class="divider"></li>
                    <li><a href="/reports/logs">Activity Log</a></li>
                </ul>
            </li>
            <li><a href="{{url('/semesters')}}">Semesters</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><p class="navbar-text">Username |</p></li>
            <li><a href="{{url('/logout')}}">[Logout]</a></li>
        </ul>
        </div>
    </div>
</nav>
