@extends('layouts.back')


@section('content')
    
    
    {{Session::get('message')}}
    
    <button class="btn btn-primary pull-right ctt-ajout">
        <a href="" class="ajouter">Ajouter</a>
    </button>
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Role</th>
            <th>Supprimer</th>
        </tr>
        
        @foreach($users as $user)
        <tr>
            <td><a href="">{{ $user->username }}</a></td>
            <td>{{ $user->email }}</a></td>
            <td>{{ $user->role }}</td>
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