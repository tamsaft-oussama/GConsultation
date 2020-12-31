@extends('adminlte::page')

@section('title', '| Page User')


@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" style="height: 100px !important; object-fit: cover;" src="{{$user->profile_photo_path}}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{$user->name}}</h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Declarations</b> <a class="float-right">{{$user->reclamations->count()}}</a>
              </li>
              <li class="list-group-item">
                <b>Clients</b> <a class="float-right">{{$user->clients->count()}}</a>
              </li>
              <li class="list-group-item">
                <b>Solde</b> <a class="float-right">{{$user->count}}</a>
              </li>
            </ul>

            <a href="{{ route('ticket.contact',['user' => $user])}}" class="btn btn-primary btn-block"><b>Envoyer Message</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">À propos</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-envelope"></i> Email</strong>

            <p class="text-muted">
              @if($user->email) {{$user->email}} @else Vide @endif
            </p>
            
            <hr>

            <strong><i class="fas fa-building"></i> Ville</strong>

            <p class="text-muted">@if($user->email) {{$user->ville}} @else Vide @endif</p>

            <hr>

            <strong><i class="fas fa-mobile-alt"></i> Telephone</strong>

            <p class="text-muted">
              @if($user->email) {{$user->tel}} @else Vide @endif
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Adresse</strong>

            <p class="text-muted">
              @if($user->email) {{$user->adresse}} @else Vide @endif
            </p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
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
       <h3 class="text-center pt-3">Declaration d'utilisateur</h3>
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
    .img-circle {
    object-fit: cover;
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
