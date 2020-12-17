@extends('adminlte::page')

@section('title', '| Page Pack')
@section('content_header')
    <h3 class="pt-3" style="float: right; width: 50%;">Gérer les Tickets</h3>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-red elevation-1"><i class="fas fa-clipboard-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Tickets</span>
          <span class="info-box-number">{{$tickets->count()}}</span>
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
          <h3 class="card-title">Liste  Tickets</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table id="table_id" class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Objet</th>
                <th>Etat</th>
                <th>Date</th>
                <th>Département</th>
                <th>Priorité</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tickets as $ticket)
                <tr>
                  <td>{{$ticket->id}}</td>
                  <td>{{$ticket->objet}}</td>
                  <td>@if($ticket->etat) <span class="badge badge-danger">Fermé</span> @else <span class="badge badge-success">Ouvert</span> @endif</td>
                  <td>{{date('Y-m-d', strtotime($ticket->created_at))}}</td>
                  <td>{{$ticket->departement}}</td>
                  <td>
                    @if($ticket->priorite=='Moyenne') 
                          <span class="badge badge-primary">{{$ticket->priorite}}</span> 
                        @elseif($ticket->priorite=='Haute')
                          <span class="badge badge-danger">{{$ticket->priorite}}</span> 
                        @else 
                          <span class="badge badge-warning">{{$ticket->priorite}}</span> 
                        @endif
                  </td>
                  <td>
                    <a class="btn btn-warning btn-sm" href="{{route('ticket.show',['ticket' => $ticket])}}" role="button"><i class="fas fa-eye"></i> Afficher</a>
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
    </style>
@stop

@section('js')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready( function () {
      $('#table_id').DataTable();
    } );
  </script>
@stop
