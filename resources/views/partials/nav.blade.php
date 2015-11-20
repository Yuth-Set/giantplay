<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-flag"></span> Article-Blog</a>
      </div>

      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <li class="active"><a href="/articles"><span class="glyphicon glyphicon-book"></span> Article</a></li>
          <li><a href="/articles/create"><span class="glyphicon glyphicon-pencil"></span> New article</a></li>
        </ul>
        {!! Form::open(['route'=>'articles.index','method'=>'POST','class'=>'navbar-form navbar-left','role'=>'search','id'=>'frmSearch'])!!}
          <div class="form-group">
          {!! Form::text('title',null,['class'=>'form-control','id'=>'txtSearch']) !!}
          </div>
        {!! Form::close() !!}
        <ul class="nav navbar-nav navbar-right">

          @if (Auth::user())
            <li><a href="/auth/logout"><span class="glyphicon glyphicon-log-out btn btn-sm btn-block btn-danger" title="Logout"></span></a></li>
          @else
            <li><a href="/auth/register"><span class="glyphicon glyphicon-check btn btn-sm btn-block btn-success" title="Sign up"></span></a></li>
            <li><a href="/auth/login"><span class="glyphicon glyphicon-log-in btn btn-sm btn-block btn-success" title="Login"></span></a></li>
          @endif

        </ul>
      </div>

    </div>
  </nav>  