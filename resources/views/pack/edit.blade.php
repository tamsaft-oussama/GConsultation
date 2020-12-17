@extends('adminlte::page')

@section('title', '| Page Pack')
@section('content')
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="card-primary">
            <div class="card-header">
              <h3 class="card-title">Modifier Pack</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
          <form role="form" action="{{route('pack.update',$pack)}}" method="post">
            @csrf
            @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label>Titre *</label>
                  <input type="text" name='titre' value="{{$pack->titre}}" class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                  <label>Nom d'offre</label><small>(optionnel)</small>
                  <input type="text" name='offre' value="{{$pack->offre}}" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Solde *</label>
                  <input type="number" name='solde' value="{{$pack->solde}}" class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                  <label>Prix *</label>
                  <input type="number" name='prix' value="{{$pack->prix}}" class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                  <label>Description</label><small>(optionnel)</small>
                <textarea class="form-control" name='description' rows="3" placeholder="Enter ..." spellcheck="false">
                  {{$pack->description}}
                </textarea>
                </div>
                <div class="form-check">
                  <input type="checkbox" name='active' class="form-check-input" value="1" @if($pack->active==1) checked @endif>
                  <label class="form-check-label" for="exampleCheck1">Activer le pack</label>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
  <!-- End Modal -->
  <div class="row">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert" style="margin: 1%; width:100%">
          {{Session::get('success')}}
        </div>
      @endif
      @if(Session::has('danger'))
        <div class="alert alert-danger" role="alert" style="margin: 1%; width:100%">
          {{Session::get('danger')}}
        </div>
      @endif
  </div>
  <div class="content-wrapper" style="margin-left: 20px">
    <!-- Content Header (Page header) -->
      <h1 style="text-transform: capitalize;">
        {{$pack -> titre}}
        <small>Pack</small>
      </h1>
    <!-- Main content -->  
    
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-edit"></i>
          Detail
        </h3>
        <button type="button" style="float: right;" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sm">Modifier</button>
      </div>
      
      <section class="content" style="min-height: 0;">
        <div class="row">
          <div class="col-xs-12" style=" width: 97%;">
              <div class="box box-primary">
                <div class="box-body" style=" padding-left: 2%; ">
                  <table class="table table-condensed">
                      <tr>
                        <th>Titre</th>
                        <td>{{$pack -> titre}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                      <tr>
                          <th>Offer</th>
                          <td>@if($pack -> offre) 
                              {{$pack -> offre}} 
                            @else 
                              N'existe pas 
                            @endif
                          </td>
                          <td></td>
                          <td></td>
                      </tr>
                      <tr>
                        <th>Solde
                        </th>
                      <td>{{$pack -> solde}}</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Prix
                        </th>
                      <td>{{$pack -> prix}} MAD</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Etat
                        </th>
                      <td>
                        @if($pack->active) 
                          <span class="badge badge-success">Active</span> 
                        @else 
                          <span class="badge badge-danger">Inactive</span> 
                        @endif
                      </td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Description
                        </th>
                      <td>@if($pack -> description) 
                        {{$pack -> description}}
                        @else
                          N'existe pas 
                        @endif
                        </td>
                        <td></td>
                        <td></td>
                      </tr>                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
      
      <div class="card-body">
        <div class="row mt-4">
          <div class="col-sm-4" style=" margin: auto; ">
            <div class="position-relative p-3 bg-gray" style="height: 180px">
              <div class="ribbon-wrapper ribbon-xl">
                <div class="ribbon bg-danger text-xl">
                  {{$pack -> offre}}
                </div>
              </div>
              {{$pack -> titre}}<br> Offre de {{$pack -> solde}} consultations <br>
              <small>à {{$pack -> prix}} Dh seulement</small>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
