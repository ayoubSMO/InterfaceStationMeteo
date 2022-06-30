@extends('layouts.app')

@section('content')
    <div class="etudiant_inscrie">
        @if (count($etudiant) > 0)
            @foreach ($etudiant as $etudiant_inscrie)
                <p>{{$etudiant_inscrie->Nom}}</p>
            @endforeach
        @else
            <p>Il exite 0 etudiant inscrie !! </p>
        @endif
    </div>
@endsection