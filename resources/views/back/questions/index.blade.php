@extends('layouts.back')


@section('content')
    
    
    {{Session::get('message')}}
    
    <button class="btn btn-primary pull-right ctt-ajout">
        <a href="" class="ajouter">Ajouter</a>
    </button>
    <table class="table">
        <tr>
            <th>Titre</th>
            <th>Niveau de class</th>
            <th>Status</th>
            <th>Supprimer</th>
        </tr>
        
        @foreach($questions as $qcm)
        <tr>
            <td><a href="">{{ $qcm->title }}</a></td>
            <td>{{ $qcm->class_level }}</a></td>
            <td>{{ $qcm->status }}</td>
            <td>
               <form action="" method="post">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button>Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection