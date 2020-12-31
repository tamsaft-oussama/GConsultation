@extends('adminlte::page')

@section('title', '| Page Réclamation')

@section('content_header')
    <h3 class="text-center pt-3">Details Declaration </h3>
@stop
@section('css')
    <style>
        .prof{
            width: 90px !important;
            height: 90px !important; 
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                <h3 class="card-title">Modifier Reclamation</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
            <form role="form" action="{{route('reclamation.update',$reclamation)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>reclamation</label>
                        <textarea class="form-control" name='commentaire' rows="3" spellcheck="false">{{ $reclamation->commentaire }}</textarea>
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
<div style="display: flex">
    <div class="col-md-4 mt-2 m-auto">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <h3 class="widget-user-username">Utilisateur Infos</h3>
            <h5 class="widget-user-desc">{{ $reclamation->user->name }}</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2 prof" src="{{ $reclamation->user->profile_photo_path }}" alt="User Avatar" >
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">VILLE</h5>
                  <span class="description-text">{{ $reclamation->user->ville }}</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">EMAIL</h5>
                  <span class="description-text">{{ $reclamation->user->email }}</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">TELEPHONE</h5>
                  <span class="description-text">{{ $reclamation->user->tel }}</span>
            </div>
            <!-- /.description-block -->
            </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
    <div class="col-md-4 mt-2 m-auto">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <h3 class="widget-user-username">Client Infos</h3>
            <h5 class="widget-user-desc">{{ $reclamation->client->numTel }}</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2 prof" src="https://picsum.photos/200" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">NOM</h5>
                  <span class="description-text">{{ $reclamation->client->nom }}</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">VILLE</h5>
                  <span class="description-text">{{ $reclamation->client->ville }}</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">EMAIL</h5>
                  <span class="description-text">{{ $reclamation->client->email }}</span>
            </div>
            <!-- /.description-block -->
            </div>
              <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        </div>
        <!-- /.widget-user -->
    </div>
</div>
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-edit"></i>
        Detail
      </h3>
      <button type="button" style="float: right;" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning btn-sm">Modifier</button>
    </div>
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
    <section class="content" style="min-height: 0;">
      <div class="row">
        <div class="col-xs-12" style=" width: 97%;">
            <div class="box box-primary">
              <div class="box-body" style=" padding-left: 2%; ">
                <table class="table table-condensed">
                    <tbody><tr>
                      <th>Declaration</th>
                      <td>{{ $reclamation->commentaire }}</td>
                      <td></td>
                      <td></td>
                  </tr>          
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
    <!-- /.card -->
  </div>

@stop

@section('css')

@stop

@section('js')
    <script>
    </script>
@stop
