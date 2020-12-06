@extends('adminlte::page')

@section('title', '| Page User')

@section('content_header')
    <h1  class="text-center">Controler les utilisateures !</h1>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-bordered text-center">
                <thead class="bg-info">
                  <tr>
                    <th scope="col">Nom Complete</th>
                    <th scope="col">Email </th>
                    <th scope="col">Solde de recherche</th>
                    <th scope="col">La date de création</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                  <tr>
                    <th scope="row">{{ $user->name }}</th>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->count }} <i class="fas fa-coins"></i>
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <form action="{{ route('user.destroy',['user'=>$user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button  href="/" class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Attention </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        voulez vous supprimer cette utilisateur ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Oui</button>
                    </div>
                </div>
                </div>
            </div>

            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop