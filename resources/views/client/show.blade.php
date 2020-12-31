@extends('adminlte::page')

@section('title', '| Page Réclamation')

@section('content_header')
    <h3 class="text-center pt-3">Réclamation Client</h3>
@stop

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <h3 class="profile-username text-center">{{$client->numTel}}</h3>

              <ul class="list-group list-group-unbordered">
                @if($client->nom)
                <li class="list-group-item">
                  <i class="fas fa-user"></i> <b>Nom :</b> <a style="margin-left: 10%">{{$client->nom}}</a>
                </li>
                @endif
                @if($client->ville)
                <li class="list-group-item">
                  <i class="fas fa-map-marker-alt"></i> <b>Ville :</b> <a style="margin-left: 10%">{{$client->ville}}</a>
                </li>
                @endif
                @if($client->email)
                <li class="list-group-item">
                  <i class="fas fa-envelope"></i> <b>Email :</b> <a style="margin-left: 10%">{{$client->email}}</a>
                </li>
                @endif
                <li class="list-group-item">
                  <b>Reclamations</b> <a class="float-right">{{$client->reclamations->count()}}</a>
                </li>
              </ul>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
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
        <div class="card">
          <table id="table_id" class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Message</th>
                <th>Date</th>
                <th>Utilisateur</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($client->reclamations as $reclamation)
                <tr>
                  <td>{{$reclamation->id}}</td>
                  <td>{{$reclamation->commentaire}}</td>
                  <td>{{date('Y-m-d', strtotime($reclamation->created_at))}}</td>
                  <td><a class="btn btn-info btn-sm" href="{{route('user.show',['user' => $reclamation->user])}}" role="button">{{$reclamation->user->name}}</a></td>
                  <td>
                    <a class="btn btn-warning btn-sm" href="{{route('reclamation.edit',['reclamation' => $reclamation])}}" role="button"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-danger btn-sm" href="{{route('reclamation.delete',['reclamation' => $reclamation])}}" role="button"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

@stop

@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <style>
    .dataTables_wrapper {
    padding: 3% ;
    }
    </style>
@stop

@section('js')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready( function () {
      $('#table_id').DataTable(
        {
          "language": {
          "zeroRecords": "Rien trouvé ",
          "info": "Affichage de la page _PAGE_ sur _PAGES_",
          "infoEmpty": "Aucun enregistrement disponible",
          "paginate": {
            "next":       "Suivant",
            "previous":   "Retour"
          },
        }
        }
      );
    } );
  </script>
@stop
