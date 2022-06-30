@section('content')
@auth
@extends('home.home')
<div class="education">
    @if (count($filiere))
    <table class="table">
    <thead class="thead-dark">
        
        <div class="text-center">
            <h1>
                La liste des filieres exister dans notre faculté !
            </h1>
          </div>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom Filiere</th>
        </tr>
      </thead>
        @foreach ($filiere as $filieres)
            <tbody>
              <tr>
                <th scope="row">{{$filieres->id_filiere}}</th>
                <td>{{$filieres->Nom_Filiere}}</td>
              </tr>
            </tbody>
        @endforeach
    </table>
    @else
    <div class="col-xl-7 col-lg-10 text-center sm-x-5">
        <h1>Il exitre {{count($filiere)}}</h1>
        <small>siir jiib les filieres azbbi !</small>
      </div>
    </div>
    @endif
</div>
@endsection
@endauth
@guest
    @extends('errors.500')
@endguest
