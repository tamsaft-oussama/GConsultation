@extends('layouts.app-user')

@section('content')
  
    <div class="card borderTop">
        <div class="card-body">
            <h4 class="card-title text-capitalize">{{ $ticket->objet }}</h4>
            <p class="card-text">
            {{ $ticket->message }}<br>
            <b>La date d'ouverture </b>: {{ $ticket->created_at }}<br>
            <b>Priorite </b>: {{ $ticket->priorite }}<br>
            <b>Departement </b>: {{ $ticket->departement }}<br>
            <b>Ticket </b>: {{ $ticket->etat ? 'Férmé' : 'Ouvert'}}<br>
            </p>
        </div>
    </div>

@endsection