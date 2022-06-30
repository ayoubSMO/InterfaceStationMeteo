@php
    use App\Models\Filiere ;

    $listeFiliere = Filiere::select('Nom_Filiere')->get();
    
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
      <li class="nav-item ">
        <a class="nav-link" href="./controllConvocation">
          <i class="material-icons">content_paste</i>
          <p>Convocation Control</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('createExamen') }}">
          <i class="material-icons">dashboard</i>
          <p>Crée Examen</p>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('createExamen') }}">
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
      <div class="col" >
        {!! Form::open(['action' => 'App\Http\Controllers\addEtudiantController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Créer Nouveau Etudiant</h4>
              <p class="card-category">Servica administration FPS</p>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Appogee</label>
                      {!! Form::text('appogee','', ['class' => 'form-control','placeholder' => 'Appogee' ,'required' => 'required']) !!}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">CIN</label>
                      {!! Form::text('CIN', '', ['class' => 'form-control','placeholder' => 'CIN' ,'required' => 'required']) !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nom</label>
                      {!! Form::text('Nom', '', ['class' => 'form-control','placeholder' => 'Nom' ,'required' => 'required']) !!}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Prenom</label>
                      {!! Form::text('Prenom', '', ['class' => 'form-control','placeholder' => 'Prenom' ,'required' => 'required']) !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email</label>
                      {!! Form::text('Email', '', ['class' => 'form-control','placeholder' => 'Email','required' => 'required']) !!}
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">telephone</label>
                      {!! Form::text('telephone', '', ['class' => 'form-control','placeholder' => 'telephone' ,'required' => 'required']) !!}
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">date de naissance</label>
                      {!! Form::date('date_de_naissance', '', ['class' => 'form-control','placeholder' => 'date de naissance' ,'required' => 'required']) !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Filiere</label>
                      <select name="filiere" id="filiere" class="form-control">
                        @foreach($listeFiliere as $listeFiliere)
                        <option value="{{$listeFiliere->Nom_Filiere}}">{{$listeFiliere->Nom_Filiere}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                </div>
                <label class="bmd-label-floating">Ajouter image Etudiant</label>
                {!! Form::file('image' ,['required' => 'required']) !!}
                    {{Form::submit('Create', ['class' => 'btn btn-primary pull-right'] )}}
                <div class="clearfix"></div>
            </div>
          </div>
        </div>
        {!! Form::close() !!}
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