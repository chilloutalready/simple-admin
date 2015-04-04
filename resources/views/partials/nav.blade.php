<nav class="navbar navbar-default">
    @if(SimpleAdminAuth::user())
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Admin panel</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @foreach(SApackageConfig('tables') as $table)
                    <li><a href="/{{ SApackageConfig('prefix') }}/{{ $table }}">{{ ucwords(str_replace('_', ' ', $table)) }}</a></li>
                @endforeach
            </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ SimpleAdminAuth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                                <li><a href="/{{SApackageConfig('prefix')}}/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
        </div>
    </div>
    @endif
</nav>