@extends('app')
@section('content')
@section('content-left')
  <h3><span class="glyphicon glyphicon-chevron-down"></span> {{ $article->title}}</h3><hr>
  <article>
      <div>
        {!! $article->body !!}
      </div>
      <br/>
      <!-- AddToAny BEGIN -->
      <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
      <a class="a2a_dd" href="https://www.addtoany.com/share?linkurl=http%3A%2F%2Fgiantplay.herokuapp.com&amp;linkname=GiantPlay"></a>
      <a class="a2a_button_facebook"></a>
      <a class="a2a_button_twitter"></a>
      <a class="a2a_button_google_plus"></a>
      <a class="a2a_button_pinterest"></a>
      <a class="a2a_button_linkedin"></a>
      </div>
      <script>
      var a2a_config = a2a_config || {};
      a2a_config.linkname = "GiantPlay";
      a2a_config.linkurl = "http://giantplay.herokuapp.com";
      </script>
      <script async src="https://static.addtoany.com/menu/page.js"></script>
      <!-- AddToAny END -->
      <br/>
      {{-- @if(Auth::user() == $article->user || Auth::user()->type == 'admin') --}}

      @if ($article->isAuthorizeArticle())
        <div class="row">
              <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
                <div class="form-group">
                    {!! link_to_route('articles.edit', 'Update', $article->id, ['class' => 'btn btn-block btn-sm btn-primary']) !!}
                </div>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
                <div class="form-group">
                    {!! Form::open(['method'=>'DELETE','route'=>['articles.destroy',$article->id]])!!}
                      {!! Form::submit('Delete',['class' => 'btn btn-block btn-sm btn-danger'])!!}
                    {!! Form::close()!!}
                </div>
              </div>
        </div>
      @endif
  </article>
  <h5><small><span class="glyphicon glyphicon-user"></span>  <i>By: {{$article->user->name}} on {{$article->created_at}}</i></small></h5>
  @unless($article->tags->isEmpty())
  <hr/>
  <h5><small><span class="glyphicon glyphicon-tags"></span> Tags:</small></h5>
  <ul>
  <small>
    @foreach($article->tags as $tag)
      <li>{{ $tag->name }}</li>
    @endforeach
  </small>

  </ul>
  @endunless
@endsection
@section('content-right')
    <h3>Seek All Shares With Tags</h3><hr/>
          <div class="row">
            <div class="col-sm-12">
              @foreach($tags as $tag)
                <p class="glyphicon glyphicon-triangle-right" >
                <a href="{{ url('tags/'.$tag->name) }}">
                <span style="font-weight: bold;">{{ $tag->name }}</span>
                </a>
                </p><br/>
              @endforeach
            </div>
          </div>
          <hr>
          <div class="row">
          <div class="col-sm-12">
              <a href="#" class="thumbnail">
                <div id="fb-root"></div>
                  <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {return;}
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));</script>


                  <div class="fb-wrap">
                  <div class="fb-like-box" data-href="https://www.facebook.com/GPlay-925519900926849/" data-width="992" data-show-faces="true" data-show-border="false" data-colorscheme="light" data-stream="false" data-header="false"></div>

                  </div>
            </a>
          </div>
          <div class="col-sm-12">
            <a href="#" class="thumbnail">
              <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUxNjA2YzM3MjMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTE2MDZjMzcyMyI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+">
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <a href="#" class="thumbnail">
              <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUxNjA2YzM3MjMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTE2MDZjMzcyMyI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+">
            </a>
          </div>
        </div>
@endsection
@section('footer')
  Yuth-2016
@endsection
@stop