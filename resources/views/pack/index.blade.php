@extends('adminlte::page')

@section('title', '| Page Pack')

@section('content_header')
  <h3 class="pt-3" style="float: right; width: 50%;">Gérer les Packs</h3>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-green elevation-1"><i class="fas fa-poll-h "></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Packs </span>
        <span class="info-box-number">{{$packs->count()}}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>  
@stop
@section('content')
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="card-primary">
            <div class="card-header">
              <h3 class="card-title">Ajouter Pack</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
          <form role="form" action="{{route('pack.store')}}" method="post">
            @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Titre *</label>
                  <input type="text" name='titre' class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                  <label>Nom d'offre</label><small>(optionnel)</small>
                  <input type="text" name='offre' class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Solde *</label>
                  <input type="number" name='solde' class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                  <label>Prix *</label>
                  <input type="number" name='prix' class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                  <label>Description</label><small>(optionnel)</small>
                  <textarea class="form-control" name='description' rows="3" placeholder="Enter ..." spellcheck="false"></textarea>
                </div>
                <div class="form-check">
                  <input type="checkbox" name='active' class="form-check-input" value="1">
                  <label class="form-check-label" for="exampleCheck1">Activer le pack</label>
                </div>
                
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ajouter</button>
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
    <div class="col-12">
      <div class="card">
        <div class="card-header">

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 250px;">
              <input type="text" id="myInput" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"  data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-plus-circle"></i> Ajouter
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Prix</th>
                <th>Solde</th>
                <th>Etat</th>
                <th style=" width: 30%; ">Action</th>
              </tr>
            </thead>
            <tbody id="myTable">
              @foreach ($packs as $pack)
              <tr>
                  <td>{{$pack->id}}</td>
                  <td>{{$pack->titre}}</td>
                  <td>{{$pack->prix}} MAD</td>
                  <td>{{$pack->solde}}</td>
                  <td>@if($pack->active) <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">Inactive</span> @endif</td>
                  <td>
                    <a class="btn btn-warning btn-sm" href="{{route('pack.edit',$pack)}}" role="button"><i class="fas fa-edit"></i> Modifier</a>
                    <form role="form" action="{{ route('pack.destroy',['pack' => $pack]) }}" method="post" style="float: left;margin-right: 2%;">
                      @csrf
                      @method("DELETE")
                      <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i> Supprimer</button>
                    </form>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
@stop
