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
                    <li><a href="/articles/create"><span class="glyphicon glyphicon-pencil"></span> New article</a></li>
                </ul>
                {!! Form::open(['route'=>'articles.search','method'=>'POST','class'=>'navbar-form','role'=>'search','id'=>'frmSearch'])!!}
                <div class="form-group">
                    {!! Form::text('k',null,['class'=>'form-control','id'=>'txtSearch','placeholder'=>'Search...']) !!}
                </div>
                {!! Form::close() !!}
                <ul class="nav navbar-nav navbar-right">
                    <li>Hi {{ Auth::user()->name }}! <a href="/auth/logout"><span class="glyphicon glyphicon-log-out" title="Logout"> Logout</span></a></li>
                </ul>
            </div>
    </div>
</nav>


