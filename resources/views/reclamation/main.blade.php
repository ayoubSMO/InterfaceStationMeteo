@include('home.home')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header card-header-danger">
              <h4 class="card-title">Reclamation dediée au etudiant : {{Auth::user()->etudiant->Prenom}} {{Auth::user()->etudiant->Nom}}</h4>
              <p class="card-category">reclamation concernant la situation pedagogique</p>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label style="color: red">Attention !! cette reclamation sera faite une fois par ans !</label>
                      <div class="form-group">
                        <label class="bmd-label-floating" style="color: red">votre reclamation cera traiter directement par le service scholarité</label>
                        @if ($etudiant->id_reclamation == 0)
                        {!!Form::open(['action' => ['App\Http\Controllers\ReclamationController@envoiReclamationSituationPedagogique', $etudiant->id_etudiant], 'method' => 'PUT', 'class' => 'pull-center'])!!}
                        <!--<textarea name="description" class="form-control" placeholder = "Ecrit votre reclamation ici" rows="12"></textarea>-->
                        {{Form::textarea('description','>', ['class' => 'form-control', 'placeholder' => 'Entrer votre reclamation ici !'])}}
                      </div>
                    </div>
                  </div>
                </div>
                <!--<button type="submit" class="btn btn-danger pull-right">submit</button>-->
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('reclamer', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
                <button type="submit" class="btn btn-primary pull-right" onclick="window.location.href='./home'">return</button>
                @else
                <button type="submit" class="btn btn-primary pull-right" onclick="window.location.href='./home'">return</button>
                @endif
                <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>