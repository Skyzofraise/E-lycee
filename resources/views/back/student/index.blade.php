@extends('layouts.back')


@section('content')
    
    
    {{Session::get('message')}}
    
    <h2>Étudiants</h2>


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