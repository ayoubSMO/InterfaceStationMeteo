@php
    use App\Models\Filiere ;
    use App\Models\Module ;
    $filierEtudiant = Filiere::where('filiere.id_filiere', $etudiant->id_filiere)->first() ;
    $moduleInFiliere = Module::select('module.nom_module')->where('module.id_filiere' ,$filierEtudiant->id_filiere)->get() ;
    $etudiantId = $etudiant->id_etudiant ;
@endphp

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
      <li class="nav-item ">
        <a class="nav-link" href="/controllExamen" >
          <i class="material-icons">toggle_off</i>
          <p>Examen Control</p>
        </a>
      </li>
      <li class="nav-item">
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
      <li class="nav-item active">
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
          @if (Session::has('message_updateConvocation'))
          <div class="alert alert-success">
            le service passe par success :) 
        </div>
        @endif
          <div class="card-header card-header-primary">
            <h4 class="card-title">Remplire liste</h4>
            <p class="card-category">System d'administration FPS
              <a target="_blank" href="https://www.uca.ma/fps">FPS</a>
            </p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary-bold font-weight-bold">
                    {!! Form::open(['action' => 'App\Http\Controllers\addModuleEtudiantController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <th>
                    Etudiant
                  </th>
                  <th>
                    Modulelist
                  </th>
                  <th>
                    add
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        {!! Form::label('appogee', $etudiant->appogee) !!}
                        {!! Form::checkbox('appogee[]', $etudiant->appogee ) !!}
                    </td>
                    <td><div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table-responsive text-primary-bold font-weight-bold">
                            <thead class=" text-primary-bold font-weight-bold">
                        <th> 
                            Module
                          </th>
                          <th>
                            caucher
                          </th>
                          </thead>
                          <tbody>
                        @foreach($moduleInFiliere as $moduleInFiliere)
                        <tr>
                        <td style="font-style: normal">{!! Form::label($moduleInFiliere->nom_module, $moduleInFiliere->nom_module) !!}</td>
                        <td>{!! Form::checkbox('modules[] ', $moduleInFiliere->nom_module) !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    </td>
                    <td>
                        {{Form::submit('Add', ['class' => 'btn btn-danger'])}}
                    </td>
                  </tr> 
                </tbody>
              </table>
            </div>
              {!!Form::close()!!}
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