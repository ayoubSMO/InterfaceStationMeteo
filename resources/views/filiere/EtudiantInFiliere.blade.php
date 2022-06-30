@extends('home.home')
@section('content')
<div class="etu">

    @if (count($etudiantFiliere))
    <table class="table">
    <thead class="thead-dark">
        @auth
        <div class="text-center">
            <h1>
                La liste des etudiant par filieres exister dans notre faculté !
            </h1>
          </div>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom Filiere</th>
          <th scope="col">etudiant</th>
        </tr>
      </thead>
        @foreach ($etudiantFiliere as $EF)
            <tbody>
              <tr>
                <th scope="row">{{$EF->id_filiere}}</th>
                <td>{{$EF->Nom_Filiere}}</td>
                <td>{{$EF->Nom}} {{$EF->Prenom}}</td>
              </tr>
            </tbody>
        @endforeach
    </table>
    @else
    <div class="col-xl-7 col-lg-10 text-center sm-x-5">
        <h1>Il exitre {{count($etudiantFiliere)}}</h1>
        <small>siir jiib les filieres azbbi !</small>
      </div>
    </div>
    @endif
</div>
@endauth
@endsection