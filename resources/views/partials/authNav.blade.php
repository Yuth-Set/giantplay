<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">

    <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand active"><span class="glyphicon glyphicon-flag"></span> GPlay</a>
            </div>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/tags"><span class="glyphicon glyphicon-tags"></span> Tag</a></li>
                    <li><a href="/articles/create"><span class="glyphicon glyphicon-pencil"></span> New Tips</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        {!! Form::open(['route'=>'articles.search','method'=>'POST','class'=>'navbar-form','role'=>'search','id'=>'frmSearch'])!!}
                        <div class="form-group">
                            {!! Form::text('k',null,['class'=>'form-control','id'=>'txtSearch','placeholder'=>'Search...']) !!}
                        </div>
                        {!! Form::close() !!}
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="javascript:">Hi {{ Auth::user()->name }}</a></li>
                    <li><a href="/auth/logout"><span class="glyphicon glyphicon-log-out" title="Logout"> Logout</span></a></li>
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                           Hello {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
    </div>
</nav>


