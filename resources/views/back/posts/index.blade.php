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
       <h2>Articles</h2> 
    </div>
    
    <p>
        <a href="" class="btn btn-success btn-sm" role="button">En ligne</a>
        <a href="" class="btn btn-warning btn-sm" role="button">Hors ligne</a>
        <a href="" class="btn btn-danger btn-sm" role="button">Supprimer</a>

        <a href="{{ route('posts.create') }}" class="ajouter btn btn-primary pull-right" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Ajouter</a>
    </p>
    
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><input type="checkbox"></th>
                <th class="center">Statut</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date</th>
                <th><i class="fa fa-comment" aria-hidden="true"></i></th>
                
                <th class="center">Modifier</th>
                <th class="center">Supprimer</th>
            </tr>
            
            @foreach($posts as $post)
            <tr>
                <td><input type="checkbox"></td>

                <td class="element-status">
                    @if( $post->status == 'published' )
                        <span class="label label-success"> </span>
                    @elseif( $post->status == 'unpublished' )
                        <span class="label label-warning"> </span>
                    @endif                
                </td>

                <td><a href="{{ route('posts.edit', $post) }}">{{ $post->title }}</a></td>
                <td>
                    @if($post->user)
                        <a href="">{{$post->user->username}}</a>
                    @else
                        {{'Anonyme'}}
                    @endif
                </td>
                <td>{{ date('d/m/Y', strtotime($post->date)) }}</td>
                <td>{{ count($post->comments) }}</td>
                
                <td class="btn-edit-delete">
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm" role="button">Modifier</a>
                </td>
                <td class="btn-edit-delete">
                    <form action="{{ route('posts.destroy', $post) }}" method='post'>
                        {{ method_field('DELETE') }}
                        {{csrf_field()}} 
                        <button  type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#mod{{ $post->id }}">Supprimer</button>

                        <!-- Popup -->
                        <div class="modal fade" id="mod{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header label-danger">
                                  <h4 class="modal-title" id="myModalLabel">Supprimer</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Es-tu sur de vouloir supprimer l'article : </p>
                                  <p><b>{{ $post->title }} ?</b></p>
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
    </div>
@endsection