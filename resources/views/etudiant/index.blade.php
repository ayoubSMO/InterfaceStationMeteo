@extends('layouts.app')
@section('content')
    <div class="education">
        @auth
        <div class="col-xl-7 col-lg-10 text-center sm-x-5">
            <h1>la liste des etudiant de notre faculte</h1>
            <small>Il exise {{count($etudiant)}}</small>
          </div>
        </div>
        @if (count($etudiant))
        <table class="table">
        <thead class="thead-dark">
            
            <tr>
              <th scope="col">#</th>
              <th scope="col">first name</th>
              <th scope="col">last name</th>
              <th scope="col">Appogee</th>
              <th scope="col">semestre</th>
              <th scope="col">filiere</th>
              <th scope="col">date_de_naissance</th>
            </tr>
          </thead>
            @foreach ($etudiant as $etudiants)
                <tbody>
                  <tr>
                    <th scope="row">{{$etudiants->id_etudiant}}</th>
                    <td>{{$etudiants->Prenom}}</td>
                    <td>{{$etudiants->Nom}}</td>
                    <td>{{$etudiants->Appogee}}</td>
                    <td>{{$etudiants->Semestre}}</td>
                    <td>{{$etudiants->Filiere}}</td>
                    <td>{{$etudiants->date_de_naissance}}</td>
                  </tr>
                </tbody>
            @endforeach
        </table>
        @else
        <div class="col-xl-7 col-lg-10 text-center sm-x-5">
            <h1>Il exitre {{count($etudiant)}}</h1>
            <small>siir jiib tkaleed azbbi !</small>
          </div>
        </div>
        @endif
    </div>
    @endauth
@endsection