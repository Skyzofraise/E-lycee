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

    <h2>QCMs</h2>

    <p class="gestion-btn">
        <a href="{{ route('questions.create') }}" class="ajouter btn btn-primary pull-right no-pull-right btn-sm" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Ajouter</a>

        <a href="" class="btn btn-success btn-sm" role="button">En ligne</a>
        <a href="" class="btn btn-warning btn-sm" role="button">Hors ligne</a>
        <a href="" class="btn btn-danger btn-sm" role="button">Supprimer</a>

    </p>
    
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><input type="checkbox" id="checkAll" class="check"></th>
                <th>Statut</th>
                <th>Titre</th>
                <th>Classe</th>
                <th>Professeur</th>
                <th>Date</th>
                <th class="btn-edit-delete">Modifier</th>
                <th class="btn-edit-delete">Supprimer</th>
            </tr>
            
            @foreach($questions as $question)
            <tr>
                <td><input type="checkbox" class="check"></td>
                <td class="element-status">
                    @if( $question->status == 'published' )
                        <span class="label label-success"> </span>
                    @elseif( $question->status == 'unpublished' )
                        <span class="label label-warning"> </span>
                    @endif                
                </td>

                <td><a href="{{ route('questions.edit', $question) }}">{{ $question->title }}</a></td>
                <td>
                    @if( $question->class_level == 'final_class')
                        Terminale S
                    @else
                        Première S
                    @endif
                </td>
                <td>
                    @if($question->user)
                        <a href="">{{$question->user->username}}</a>
                    @else
                        {{'Anonyme'}}
                    @endif
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($question->created_at)) }}
                </td>
                <td>
                    <form action="{{ route('questions.edit', $question) }}" method="get">
                        <button class="btn btn-primary btn-sm" role="button">Modifier</button>
                    </form>
                </td>
                <td class="btn-edit-delete">
                    <form action="{{ route('questions.destroy', $question) }}" method='post'>
                        {{ method_field('DELETE') }}
                        {{csrf_field()}}
                        <button  type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#mod{{ $question->id }}">Supprimer</button>

                        <!-- Popup -->
                        <div class="modal fade" id="mod{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header label-danger">
                                  <h4 class="modal-title" id="myModalLabel">Supprimer</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Es-tu sur de vouloir supprimer le QCM : </p>
                                  <p><b>{{ $question->title }}</b> ?</p>
                                  <button class="btn btn-danger" role="button">Oui</button>
                                  <button class="btn btn-danger" type="button" class="close" data-dismiss="modal" aria-label="Close">Non</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- Popup end -->
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
@endsection