@extends('adminlte::page')

@section('title', '| Page Réclamation')

@section('content_header')
    <h3 class="text-center pt-3">Ajouter votre réclamation à ce client</h3>
@stop

@section('content')

 <div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-danger card-outline">
            <div class="card-header"><h5 class="card-title">Client information</h5></div>
              <div class="card-body">
                <p class="card-text">
                    <div class="info-box">
                        <span class="info-box-icon bg-dark"><i class="far fa-copy"></i></span>
          
                        <div class="info-box-content">
                          <h6>{{ $client->nom ?? 'inconnu' }}</h6>
                          <h6>{{ $client->ville ?? 'inconnu'}}</h6>
                          <h6>{{ $client->email ?? 'inconnu' }}</h6>
                          <h6 class="info-box-number">{{ $client->numTel ?? 'inconnu' }}</h6>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                </p>
                <a href="#" class="card-link btn btn-dark btn-xs float-left" data-toggle="modal" data-target="#addClienInfo">Ajouter autre information</a>
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
                            <form method="POST" action="{{ route('reclamation.store') }}">
                                @csrf
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $client->id }}">
                                    @if ($errors->has('nom'))
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                    @endif
                                  </div>
                                  <div class="form-group">
                                      <input type="email" class="form-control" id="email" name="email" placeholder="email">
                                      @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                      @endif
                                  </div>
                                <div class="float-left">
                                    <button type="submit" class="btn btn-dark btn-xs">Enregistrer  <i class="fas fa-save"></i></button>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Fermer  <i class="fas fa-times"></i></button>
                                </div>
                              </form>
                        </div>
                    </div>
                    </div>
                </div>
                
                <a href="#" class="card-link btn btn-danger btn-xs float-right" data-toggle="modal" data-target="#addReclamation">Ajouter une réclamation</a>
                <div class="modal fade" id="addReclamation" tabindex="-1" aria-labelledby="addReclamation" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une Réclamation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('addReclamation',['reclamation'=>$client->id]) }}">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    @if ($errors->has('commentaire'))
                                    <span class="text-danger">{{ $errors->first('commentaire') }}</span>
                                    @endif
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="commentaire"></textarea>
                                  <input type="hidden" name="client" value="{{ $client->id }}">
                                  <input type="hidden" name="user" value="{{ $client->user_id }}">
                                </div>
                                <div class="float-left">
                                    <button type="submit" class="btn btn-dark btn-xs">Enregistrer  <i class="fas fa-save"></i></button>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Fermer  <i class="fas fa-times"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>

              </div>
            </div><!-- /.card -->
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
