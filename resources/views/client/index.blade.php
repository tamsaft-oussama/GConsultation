@extends('adminlte::page')

@section('title', '| Page Client')

@section('content_header')
    <h3 class="pt-3" style="float: right; width: 50%;">Gérer les clients</h3>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Clients</span>
          <span class="info-box-number">{{$clients->count()}}</span>
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
          <h3 class="card-title">Liste  Clients</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table id="table_id" class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Telephone</th>
                <th>Ville</th>
                <th>Email</th>
                <th>Notation</th>
                <th>Reclamation</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($clients as $client)
                <tr>
                  <td>{{$client->id}}</td>
                  <td>{{$client->nom}} @if($client->nom) {{$client->nom}} @else Vide @endif</td>
                  <td>{{$client->numTel}}</td>
                  <td>{{$client->ville}} @if($client->ville) {{$client->ville}} @else Vide @endif</td>
                  <td>{{$client->email}} @if($client->email) {{$client->email}} @else Vide @endif</td>
                  <td class="stars">
                    <span class="fa fa-star @if($client->reclamations->count()<5) checked @endif"></span>
                    <span class="fa fa-star @if($client->reclamations->count()<4) checked @endif"></span>
                    <span class="fa fa-star @if($client->reclamations->count()<3) checked @endif"></span>
                    <span class="fa fa-star @if($client->reclamations->count()<2) checked @endif" ></span>
                    <span class="fa fa-star @if($client->reclamations->count()<1) checked @endif"></span>
                    <span> ({{$client->reclamations->count()}})</span>
                  </td>
                  <td>                    
                    <a class="btn btn-dark btn-sm" href="{{route('client.show',['client' => $client])}}" role="button"><i class="fas fa-eye"></i> Afficher</a>
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
