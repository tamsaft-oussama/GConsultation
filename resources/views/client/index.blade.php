@extends('adminlte::page')

@section('title', '| Page Client')

@section('content_header')
    <h3 class="text-center pt-3">Gérer les clients</h3>
@stop

@section('content')

 <div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-4">
          <div class="info-box">
  
            <div class="info-box-content">
              <form  method="post" action="{{ route('client.search') }}">
                @csrf
                  <div class="input-group">
                      <input name="search" type="tel" pattern="[0-9]{10}" class="form-control form-control-md" placeholder="Ex:0610101111" required>
                      <div class="input-group-append">
                          <button id="search" class="btn btn-sm btn-danger">
                              <i class="fa fa-search"></i>
                          </button>
                      </div>
                  </div>
              </form>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>

        <div class="col-md-4">
          <div class="info-box">
            <div class="info-box-content">
              <a type="button" class="btn btn-md btn-dark btn-block text-light" title="Chaque recherche que vous effectuez soustrait un point à votre solde">
                Solde : <i class="fas fa-search-dollar"></i> <span class="font-weight-bold">{{  $user->count }}</span> 
              </a>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>

        <div class="col-md-4">
          <div class="info-box">  
            <div class="info-box-content">
              <a class="card-link btn btn-md btn-danger btn-block mr-3 text-light" data-toggle="modal" data-target="#addClienInfo"><i class="fas fa-user-plus"></i> Ajouter un client</a>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>

        <div class="col-12">
          @if($message ?? false)
          <div class="alert alert-warning alert-dismissible text-center fade show" role="alert">
            {{  $message ?? ''}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        </div>
        <!-- /.card -->
        <!-- Modal -->
        <div class="modal fade" id="addClienInfo" tabindex="-1" aria-labelledby="addClienInfo" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="{{ route('client.store') }}">
                    @csrf
                    @method('POST')
                      <div class="form-group">
                        <input type="text" class="form-control" id="tel" name="numTel" placeholder="Numéro de téléphone">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        @if ($errors->has('numTel'))
                        <span class="text-danger">{{ $errors->first('numTel') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville">
                          @if ($errors->has('numTel'))
                          <span class="text-danger">{{ $errors->first('ville') }}</span>
                          @endif
                      </div>
                      <div class="float-left">
                        <button type="submit" class="btn btn-dark ">Enregistrer  <i class="fas fa-save"></i></button>
                      </div>
                      <div class="float-right">
                          <button type="button" class="btn btn-danger " data-dismiss="modal">Fermer  <i class="fas fa-times"></i></button>
                      </div>
                  </form>
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
    <script>

    </script>
@stop
