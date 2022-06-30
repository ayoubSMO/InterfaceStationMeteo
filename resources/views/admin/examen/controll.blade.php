<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../assets/img/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>
E-service FPS
</title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- CSS Files -->
<link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet" />

</head>
<body class="">
<div class="wrapper ">
<div class="sidebar" data-color="purple" data-background-color="black" data-image="../public/image/sidebar-1.jpg">
  <div class="logo"><a href="./" class="simple-text logo-normal">
      E-service FPS
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item  ">
        <a class="nav-link" href="{{ url('home') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item  active">
        <a class="nav-link" href="/controllExamen" >
          <i class="material-icons">toggle_off</i>
          <p>Examen Control</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./controllConvocation">
          <i class="material-icons">content_paste</i>
          <p>Convocation Control</p>
        </a>
      </li>
      <li class="nav-item  ">
        <a class="nav-link" href="{{ url('createExamen') }}">
          <i class="material-icons">dashboard</i>
          <p>Crée Examen</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('createEtudiant') }}">
          <i class="material-icons">dashboard</i>
          <p>Crée Etudiant</p>
        </a>
      </li>
      <li class="nav-item active-pro ">
        <a class="nav-link" href="">
          <i class="material-icons">unarchive</i>
          <p>Administion FPS</p>
        </a>
      </li>
    </ul>
  </div>
</div>
<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;">Dashboard</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        @include('components.navbar')
      </div>
      
    </div>
  </nav>
  <div class="content">
    <div class="container-fluid">
      <div class="container-fluid">
        <div class="card card-plain">
          @if ($message == 'message_updateExamen')
          <div class="alert alert-success">
            le service passe par success :) 
        </div>
        @endif
          <div class="card-header card-header-primary">
            <h4 class="card-title">Examen Controll</h4>
            <p class="card-category">System d'administration FPS
              <a target="_blank" href="https://www.uca.ma/fps">FPS</a>
            </p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @foreach ($examen as $examen)
              <table class="table">
                <thead class=" text-primary-bold font-weight-bold">
                    
                    {!!Form::open(['action' => ['App\Http\Controllers\controllExamenController@update', $examen->id_examen], 'method' => 'PUT', 'class' => 'pull-center'])!!}
                    {{Form::hidden('_method', 'PUT')}}
                  <th>
                    No
                  </th>
                  <th>
                    saison
                  </th>
                  <th>
                    session
                  </th>
                  <th>
                    update ouverture
                  </th>
                  <th>
                    update fermeture
                  </th>
                  <th>
                    Switch
                  </th>
                  <th>
                    update
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      {{$examen->id_examen}}
                    </td>
                    <td>
                      {{$examen->saison}}
                    </td>
                      
                    <td>
                      {{$examen->session}}
                    </td>
                    <td>
                        {{ Form::dateTime('dateOuverture', $examen->dateOuverture, ['class' => 'form-control']) }}
                    </td>
                    <td class="font-weight-bold" style="color:rgba(255, 0, 0, 0.623)">
                        {{ Form::dateTime('dateFermeture', $examen->dateFermeture, ['class' => 'form-control']) }}
                    </td>
                    <td >
                        {{Form::checkbox('ouvertureFermeture','on', $examen->etat)}}
                      <td >
                        {{Form::submit('update', ['class' => 'btn btn-danger'])}}
                    </td>
                  </tr> 
                </tbody>
              </table>
              {!!Form::close()!!}
              @endforeach
            </div>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--
    
    jnaab + navBare  
  -->
</div>
  <!--
    Admin ------------------------------------------------------------
  -->
</div>
<!--   Core JS Files   -->
<script src="{{ asset('lib/jquery/jquery.min.js')}}"></script>

<script src="{{ asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{ asset ('lib/jquery.scrollTo.min.js')}}"></script>
<script src="{{ asset('lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{ asset('lib/jquery.sparkline.js')}}"></script>
<!--common script for all pages-->
<script src="{{ asset('lib/common-scripts.js')}}"></script>
<script type="text/javascript" src="{{ asset('lib/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{ asset('lib/gritter-conf.js')}}"></script>
<!--script for this page-->
<script src="{{ asset('lib/sparkline-chart.js')}}"></script>
<script src="{{ asset('lib/zabuto_calendar.js')}}"></script>

<script src="{{ asset('js/material-dashboard.js') }}" type="text/javascript"></script>

</body>


</html>