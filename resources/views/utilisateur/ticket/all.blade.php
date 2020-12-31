@extends('layouts.app-user')


@section('content')

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              Support <small>Votre historique de demandes</small>
            </h3>
            <!-- /. tools -->
          </div>
          <div class="card-body">
            <table id="table_id" class="table table-hover">
              <thead>
                <tr>
                  <th>Département</th>
                  <th>Objet</th>
                  <th>Etat</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($tickets2 as $ticket)
                  <tr>
                    <td><a href="{{route('ticket.show2',['ticket' => $ticket])}}">{{$ticket->departement}}</a></td>
                    <td style="width: 45%;"><a href="{{route('ticket.show2',['ticket' => $ticket])}}">{{$ticket->objet}}</a></td>
                    <td><a href="{{route('ticket.show2',['ticket' => $ticket])}}">@if($ticket->etat) <span class="badge badge-danger">Fermé</span> @else <span class="badge badge-success">Ouvert</span> @endif</a></td>
                    <td><a href="{{route('ticket.show2',['ticket' => $ticket])}}">{{date('Y-m-d', strtotime($ticket->created_at))}}</a></td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="4"><div class="alert alert-info">Aucun résultat trouvé </div></td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
@endsection



