@extends('layouts.back')


@section('content')
    
    
    @if( Session::get('message') )
        <div class="alert alert-success" role="alert">
            <i class="fa fa-check" aria-hidden="true"></i> {{Session::get('message')}}
        </div>
    @endif

    @if( Session::get('erreur') )
        <div class="alert alert-danger" role="alert">
            <i class="fa fa-times" aria-hidden="true"></i> {{Session::get('erreur')}}
        </div>
    @endif
    
    <div class="page-header">
       <h2>Élèves</h2> 
    </div>

    <div class="table-responsive">
        <table class="table users-table">
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Classe</th>
            </tr>
            
            @foreach($users as $user)
            @if( $user->role !== 'teacher')
                <tr>
                    <td><a href="">{{ $user->username }}</a></td>
                    <td>{{ $user->email }}</a></td>
                    <td>
                        @if( $user->role == 'final_class')
                            Terminale S
                        @else
                            Première S
                        @endif
                    </td>
                </tr>
            @endif
            
            @endforeach
        </table>
    </div>

@endsection