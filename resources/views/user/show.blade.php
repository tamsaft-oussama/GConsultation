@extends('adminlte::page')

@section('title', '| Page Réclamation')

@section('content_header')
    <h3 class="text-center pt-3">User Réclamation</h3>
@stop

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <h3 class="profile-username text-center">{{$user->name}}</h3>

              @if($user->email)<p class="text-muted text-center">{{$user->email}}</p>@endif

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Reclamations</b> <a class="float-right">{{$user->reclamations->count()}}</a>
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
                <th>Client</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user->reclamations as $reclamation)
                <tr>
                  <td>{{$reclamation->id}}</td>
                  <td>{{$reclamation->commentaire}}</td>
                  <td>{{date('Y-m-d', strtotime($reclamation->created_at))}}</td>
                  <td><a class="btn btn-info btn-sm" href="{{route('client.show',['client' => $reclamation->client])}}" role="button">{{$reclamation->client->numTel}}</a></td>
                  <td>
                    <a class="btn btn-danger btn-sm" href="{{route('reclamation.delete',['reclamation' => $reclamation])}}" role="button"><i class="fas fa-trash-alt"></i> Supprimer</a>
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
