<header>
    <nav class="navbar navbar-inverse navbar-static-top" style= background-color:#f03>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" >Microposts</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style= background-color:#f03>
                    @if (Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" style= background-color:#f03>
                                <li><a href="/">TimeLine</a></li>
                                <li>{!! link_to_route('users.show', 'MyProfile',  ['id' =>Auth::user()->id]) !!}</li>
                                <li role="separator" class="divider"></li>
                                <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
                            </ul>
                        </li>
                    @else
                        <li>{!! link_to_route('signup.get', 'Signup') !!}</li>
                        <li>{!! link_to_route('login', 'Login') !!}</li>
                    @endif
                </ul>
               
                   
                    <div class="col-xs-offset-1 col-sm-3 l">
                    
                    {!! Form::open(['route' => ['users.index'], 'method' => 'get']) !!}
                        {!! Form::text('keyword', old('keyword'),['class' => 'form-control', 'placeholder' => 'username']) !!}
                        {!! Form::submit('search', ['class' => 'btn btn-success btn-md']) !!}
                    {!! Form::close() !!}
                    </div>
                   
                
                
            </div>
        </div>
    </nav>
</header>