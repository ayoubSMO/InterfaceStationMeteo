@php
    use App\Models\Filiere ;
    use App\Models\Semestre ;
    use App\Models\Etudiant ;
    use App\Models\Module ;
    use App\Models\Reclamation ;
    $filiere = Filiere::all() ;
    $semestre = Semestre::all() ;
    $etudiant = Etudiant::all() ;
    $module = Module::all() ;
    $reclamation = Reclamation::all() ;
    $etudiantInscrie = Etudiant::where('id_exame' , 1)->get() ;
    //$filiereEtudiant = Filiere::select('filiere.Nom_Filiere')->where('id_filiere' ,$etudiantInscrie->id_filiere)->first()->Nom_Filiere ;
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
@php
    $compteurAnnonces = 1 ;
@endphp
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../public/image/sidebar-1.jpg">
      <div class="logo"><a href="./" class="simple-text logo-normal">
          E-service FPS
        </a>
      </div>
      @if (Auth::user()->hasRole('administration'))
      @if (Request::path() == 'home')
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./home">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/controllExamen">
              <i class="material-icons">toggle_off</i>
              <p>Examen Control</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/controllConvocation">
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
          <li class="nav-item">
            <a class="nav-link" href="{{ url('createEtudiant') }}">
              <i class="material-icons">dashboard</i>
              <p>Crée Etudiant</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="./upgrade.html">
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
      <!--
        jnaab + navBare  
      -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">school</i>
                  </div>
                  <p class="card-category">Nombre Etudiant inscrie Au examen</p>
                  <h3 class="card-title">{{count($etudiantInscrie)}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons" >date_range</i>2020/2021
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">history_edu</i>
                  </div>
                  <p class="card-category">Nombre semestre</p>
                  <h3 class="card-title">{{count($semestre)}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> 2020/2021
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">mood</i>
                  </div>
                  <p class="card-category">Nombre D'etudiant</p>
                  <h3 class="card-title">{{count($etudiant)}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> 2020/2021
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">priority_high</i>
                  </div>
                  <p class="card-category">Nombre des reclamations</p>
                  <h3 class="card-title">{{count($reclamation)}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> 2020/2021
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">bookmark_border</i>
                  </div>
                  <p class="card-category">Nombre de modules</p>
                  <h3 class="card-title">{{count($module)}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> 2020/2021
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">bookmark_border</i>
                  </div>
                  <p class="card-category">Nombre des filiére</p>
                  <h3 class="card-title">{{count($filiere)}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> 2020/2021
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Liste des etudiant Inscrie</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-primary">
                      <th>Numéro</th>
                      <th>Nom complet</th>
                      <th>filiere</th>
                    </thead>
                    <tbody>
                      @foreach ($etudiantInscrie as $etudiantInscrie)
                      <tr>
                        <td>{{$etudiantInscrie->id_etudiant}}</td>
                        <td>{{$etudiantInscrie->Nom}} {{$etudiantInscrie->Prenom}}</td>
                        <td>{{Filiere::select('filiere.Nom_Filiere')->where('id_filiere' ,$etudiantInscrie->id_filiere)->first()->Nom_Filiere}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Liste des filieres</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-primary">
                      <th>Numéro</th>
                      <th>Nome de la filiere</th>
                    </thead>
                    <tbody>
                      @foreach ($filiere as $filiere)
                      <tr>
                        <td>{{$filiere->id_filiere}}</td>
                        <td>{{$filiere->Nom_Filiere}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">Liste des reclamation</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-primary">
                      <th>Numéro</th>
                      <th>id etudiant</th>
                      <th>text</th>
                    </thead>
                    <tbody>
                      @foreach ($reclamation as $reclamation)
                      <tr>
                        <td>{{$reclamation->id_reclamation}}</td>
                        <td>{{$reclamation->id_etudiant}}</td>
                        <td>{{$reclamation->description}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  @else
    <div class="main-panel">
      <div></div>
    </div>
  @endif
      <!--
        Admin ------------------------------------------------------------
      -->
      @else
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">
              <i class="material-icons">home</i>
              <p>home</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('profile') }}">
              <i class="material-icons">person</i>
              <p>Consulter votre profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('examen') }}">
              <i class="material-icons">emoji_emotions</i>
              <p>Inscrie au examen</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="https://www.uca.ma/fps">
              <i class="material-icons">school</i>
              <p>Notre site officiel</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('convocation') }}">
              <i class="material-icons">save</i>
              <p>telecharger convocation</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="">
              <i class="material-icons">unarchive</i>
              <p>FP safi E-service</p>
              <small class="centered">{{Auth::user()->etudiant->Nom }} {{ Auth::user()->etudiant->Prenom }}</small>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      @include('components.navbar')
      @if (Request::path() == 'home')
      <div class="content">
        <div class="container-fluid">
          <div class="container-fluid">
            <div class="card card-plain">
              @if (Session::has('message') || Session::has('message_reclamation'))
              <div class="alert alert-success">
                le service passe par success :) 
            </div>
            @endif
              <div class="card-header card-header-primary">
                <h4 class="card-title">infos</h4>
                <p class="card-category">Faculté polydisciplinaire de SAFI
                  <a target="_blank" href="https://www.uca.ma/fps">FPS</a>
                </p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary-bold font-weight-bold">
                      <th>
                        No
                      </th>
                      <th>
                        Annonce
                      </th>
                      <th>
                        ouverture dans
                      </th>
                      <th>
                        fermeture dans
                      </th>
                      <th>
                        Entrer
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          {{$compteurAnnonces ++ }}
                        </td>
                        <td>
                          inscription au examen
                        </td>
                        <td class="font-weight-bold" style="color:rgba(0, 175, 29, 0.623)">
                          {{$resultatOuverture}}
                          @if ($resultatOuverture > 0)
                          jours !
                          @endif
                        </td>
                        <td class="font-weight-bold" style="color:rgba(255, 0, 0, 0.623)">
                          {{$resultatFermeture}} 
                          @if ($resultatFermeture > 0)
                              jours !
                          @endif
                        </td>
                        
                          @if ((str_contains($resultatOuverture,'Examen deja ouvert') && $resultatFermeture != 0) && Auth::user()->etudiant->id_exame == 0)
                          <td >
                          <button class="btn btn-primary " onclick = "window.location.href='./examen';" >inscrie au examen</button>
                          @else
                          <td>
                          <button class="btn btn-danger " onclick = "window.location.href='./examen';" disabled >inscrie au examen</button>
                          </td>
                          @endif 
                        </td>
                      </tr>
                      <tr>
                        <td>
                          {{$compteurAnnonces ++ }}
                        </td>
                        <td>
                          telechargement de la convocation
                        </td>
                        <td class="font-weight-bold" style="color:rgba(0, 175, 29, 0.623)">
                          {{$resultatOuvertureConvo}}
                        </td>
                        <td class="font-weight-bold" style="color:rgba(255, 0, 0, 0.623)">
                          {{$resultatFermetureConvo}} 
                          @if ($resultatFermetureConvo > 0)
                              jours !
                          @endif
                        </td>
                        @if ((str_contains($resultatOuvertureConvo,' ') && $resultatFermetureConvo != 0) && Auth::user()->etudiant->id_convocation == 0)
                          <td >
                          <button class="btn btn-primary " onclick = "window.location.href='./convocation';" >telecharger convocation</button>
                          @else
                          <td>
                          <button class="btn btn-danger " onclick = "window.location.href='./convocation';" disabled >telecharger convocation</button>
                          </td>
                          @endif 
                        </td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
  @else
        @yield('content')
        @endif
  
        @endif
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