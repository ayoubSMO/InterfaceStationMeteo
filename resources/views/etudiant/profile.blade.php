@include('home.home')
@php
    use App\Models\Filiere ;
    use App\Models\Etudiant ;
    use App\Models\Module ;
    use App\Models\etudiant_module;
    use App\Models\Semestre ;
    $filierEtudiant = Filiere::select('filiere.Nom_Filiere')->where('filiere.id_filiere', Auth::user()->etudiant->id_filiere)->first()->Nom_Filiere ;
    $etudiantPhoto = Auth::user()->etudiant->photo;
    $etudiant = new Etudiant() ;
    $etudiant = Auth::user()->etudiant ;
    $listModule = etudiant_module::select('etudiant_module.id_module')->where('etudiant_module.id_etudiant' ,$etudiant->id_etudiant)->get() ;
    
    //$nomModules = Module::select('module.nom_module')->where('module.id_module' ,$listModule->id_module)->get();

    // Semestre d'un module pour l'etudiant authentifier ! 
    //$nomSemestre = Semestre::select('semestre.nom_semestre')->join('module' ,'module.id_semestre' ,'=' ,'semestre.id_semestre')->join('etudiant_module' ,'mdule.id_module' ,'=' ,$listModule->id_module);
    

@endphp
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Etudiant : {{Auth::user()->etudiant->Prenom}} {{Auth::user()->etudiant->Nom}}</h4>
            <p class="card-category">information pedagogique</p>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Appogee</label>
                    <input type="text" class="form-control" placeholder="{{Auth::user()->etudiant->Appogee}}" disabled>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">CIN</label>
                    <input type="text" class="form-control" placeholder="{{Auth::user()->etudiant->CIN}}" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">telephone</label>
                    <input type="email" class="form-control" placeholder="{{Auth::user()->etudiant->telephone}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nom</label>
                    <input type="text" class="form-control" placeholder="{{Auth::user()->etudiant->Nom}}" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Prenom</label>
                    <input type="text" class="form-control" placeholder="{{Auth::user()->etudiant->Prenom}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="text" class="form-control" placeholder="{{Auth::user()->etudiant->email}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">date de naissance</label>
                    <input type="text" class="form-control" placeholder="{{Auth::user()->etudiant->date_de_naissance}}" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Filiere</label>
                    <input type="text" class="form-control" placeholder = "{{$filierEtudiant}}" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Inscrie au examen ou non</label>
                    @if (Auth::user()->etudiant->id_exame == 0)
                    <input type="text" class="form-control form-control-red" placeholder="Non inscrit !!" disabled>
                    @else
                    <input type="text" class="form-control form-control-red" placeholder="vous etes deja inscrie :)" disabled>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Liste des modules inscrie</label>
                    <div class="form-group">
                      <ul class="list-group">
                        @foreach ($listModule as $listModule)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          {{Module::select('module.nom_module')->where('module.id_module' ,$listModule->id_module)->first()->nom_module}}
                          <span class="badge badge-secondary badge-pill">{{Semestre::select('semestre.nom_semestre')->join('module' ,'module.id_semestre' ,'=' ,'semestre.id_semestre')->where('module.id_module',$listModule->id_module)->first()->nom_semestre}}
                          </span>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-danger pull-right" onclick="window.location.href='./reclamation'">Reclamer</button>
              <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="javascript:;">
              <img class="img" src="{{asset('image/' . $etudiantPhoto)}}" />
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">Etudiant / {{$filierEtudiant}}</h6>
            <h4 class="card-title">{{Auth::user()->etudiant->Prenom}} {{Auth::user()->etudiant->Nom}}</h4>
            <p class="card-description ">
              <p>Bienvenu</p>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

