
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>@yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendor/css/select2.min.css')}}">
  <script src=" {{ URL::asset('js/jQuery-2.1.4.min.js')}} "></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
    </head>

    <body>

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Agus Blog</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li><a href="{{ action('SiteController@index') }}">CRUD</a></li>
              <li><a href="{{ action('UserController@index') }}">CRUD User</a></li>
              <li><a href="{{ action('TbFileController@index') }}">CRUD FILE</a></li>
              <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                  </ul>
                </li>
                <li><a href="{{ action('SiteController@formMail') }}">Form Mail</a></li>
                <li><a href="{{ action('SocketController@index') }}">Chat</a></li>
                @endif
                <li><a href="{{ action('DataTabelController@index') }}">Data Tabel</a></li>
              </ul>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>

      <div class="container" style="margin-top:100px">
        <div class="row">
          <div class="col-lg-12"> 
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <em>
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{!! $error !!}</li>
                  @endforeach
                </ul>
              </em>
            </div>
            @endif
            @if(Session::has('flash_message'))
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
              <i class="glyphicon glyphicon-ok"></i> <em> {!! session('flash_message') !!}</em>
              </div>
              @endif
            </div>
          </div>
          @yield('content')

        </div><!-- /.container -->
        <div class="modal fade" id="modalMd" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalMdTitle"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="modalError"></div>
                        <div id="modalMdContent"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalLg" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLgTitle"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="modalError"></div>
                        <div id="modalLgContent"></div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=" {{ URL::asset('js/bootstrap.min.js')}} "></script>
    <script src=" {{ URL::asset('js/main.js')}} "></script>
    <script src=" {{ URL::asset('vendor/js/select2.min.js')}} "></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
  </body>
  </html>
