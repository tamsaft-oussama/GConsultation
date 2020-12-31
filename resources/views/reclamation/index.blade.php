@extends('adminlte::page')

@section('title', '| Page Client')

@section('content_header')
    <h3 class="pt-3" style="float: right; width: 50%;">Gérer les declarations</h3>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Declarations</span>
          <span class="info-box-number">{{$reclamations->count()}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
@stop

@section('content')
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
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste  Declarations</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table id="table_id" class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Client</th>
                <th>Declaration</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($reclamations as $reclamation)
                <tr>
                  <td>{{$reclamation->id}}</td>
                  <td><a  href="{{route('user.show',['user' => $reclamation->user])}}">{{$reclamation->user->name}}</a></td>
                  <td><a  href="{{route('client.show',['client' => $reclamation->client])}}">{{$reclamation->client->numTel}}</a></td>
                  <td>{{$reclamation->commentaire}}</td>
                  <td>                    
                    <a class="btn btn-dark btn-sm" href="{{route('reclamation.edit',['reclamation' => $reclamation])}}" role="button"><i class="fas fa-eye"></i> Afficher</a>
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <style>
    .p-0 {
    padding: 3% !important;
    }
    .buttons-excel{
      background-color: #343a40; /* Green */
      border: none;
      color: #fff;
      width: 9%;
      padding: 4px;
      float: left;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 12px;
    }
    .checked {
      color: orange !important;
    }
    .stars span{
      color:gray;
    }
    </style>
@stop

@section('js')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
  <script>
    //
    $(document).ready(function() {
    $('#table_id').DataTable( {
        dom: 'Bfrtip',
        select: true,
        stateSave: true,
        buttons: [
            'excelHtml5'
        ],
        "language": {
          "zeroRecords": "Rien trouvé - désolé",
          "info": "Affichage de la page _PAGE_ sur _PAGES_",
          "infoEmpty": "Aucun enregistrement disponible",
          "paginate": {
            "next":       "Suivant",
            "previous":   "Retour"
          },
        }
    } );
} );
  </script>
@stop
