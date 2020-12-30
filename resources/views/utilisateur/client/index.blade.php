@extends('layouts.app-user')

@section('content')

  <div class="card borderTop  mb-3" style="max-width:100%">
    <div class="card-body text-secondary">
      <div class="row">
        <div class="col-8">
            <form  method="get" action="{{ route('client-user.search') }}">
                  <div class="input-group">
                      <input name="search" type="tel" class="form-control form-control-sm" placeholder="Chercher un client par téléphone" pattern="[0-9]{10}"  required>
                      <div class="input-group-append">
                          <button id="search" class="btn btn-sm btn-dark">
                              <i class="fa fa-search"></i>
                          </button>
                      </div>
                  </div>
            </form>
        </div>
        <div class="col-4">
            <button class="btn btn-dark btn-sm float-right">Solde : {{ $user->count }} Point</button>
        </div>
      </div>
    </div>
  </div>

  <div class="card borderTop  mb-3" style="max-width:100%">
    <div class="card-header"><i class="fas fa-user"></i> Informations Client</div>
    <div class="card-body text-secondary">
      @isset($message)
        <p class="card-text alert alert-danger  alert-dismissible fade show text-center" style="padding: 2px !important;">{{ $message ?? '' }}</p>
      @endisset
      @isset($client)
        <span class="pr-1"><i class="fas fa-user-tie text-"></i> {{ $client->nom ?? 'inconnu' }}</span> |
        <span class="pr-1"><i class="fas fa-city text-"></i> {{ $client->ville ?? 'inconnu'}}</span> |
        <span class="pr-1"><i class="fas fa-envelope text-"></i> {{ $client->email ?? 'inconnu' }}</span> |
        <span class="pr-1"><i class="fas fa-mobile-alt text-"></i> {{ $client->numTel ?? 'inconnu' }}</span>
      @endisset
      @empty($client)
            <div class="card-text">Pas d'information</div>
      @endempty
   </div>
  </div>

  <div class="card borderTop  mb-3" style="max-width:100%">
    <div class="card-header">
      <div class="row">
        <div class="col">
          @isset($client)
            @if($client->reclamations_count < 2)
            <i class="fas fa-smile text-success"></i>
            @elseif($client->reclamations_count >= 2 && $client->reclamations_count < 3)
            <i class="fas fa-meh text-warning"></i>
            @elseif($client->reclamations_count > 2)
            <i class="fas fa-frown text-danger"></i>
            @endif
            <span class="info-box-text">Crédibilité : {{ $client->reclamations_count }} Réclamation(s)</span>
          @endisset
          @empty($client)
            <i class="fas fa-exclamation"></i> Réclamation
          @endempty
        </div><!--end col-->
        <div class="col">
          {{-- if this user don't have reclamation for this client show this button --}}
          @isset($can)
            @if ($can)
            <a class="btn btn-success btn-sm float-right text-light" data-toggle="modal" data-target="#addReclamation">Ajouter Votre Réclamation <i class="fas fa-exclamation text-danger"></i></a>
            <div class="modal fade" id="addReclamation" tabindex="-1" aria-labelledby="addReclamation" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ajouter une Réclamation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                      <form method="POST" action="{{ route('client-user.reclamation',['reclamation'=>$client->id]) }}">
                          @csrf
                          @method('POST')
                          <div class="form-group">
                              @if ($errors->has('commentaire'))
                              <span class="text-danger">{{ $errors->first('commentaire') }}</span>
                              @endif
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="commentaire" placeholder="Posé votre réclamation"></textarea>
                            <input type="hidden" name="client" value="{{ $client->id }}">
                            <input type="hidden" name="user" value="{{ $user->id }}">
                          </div>
                          <div class="float-left">
                              <button type="submit" class="btn btn-success btn-sm">Enregistrer  <i class="fas fa-save"></i></button>
                          </div>
                          <div class="float-right">
                              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer  <i class="fas fa-times"></i></button>
                          </div>
                      </form>
                  </div>
              </div>
              </div>
            </div>
            @endif
          @endisset
        </div><!--end col-->
      </div><!--end row-->
    </div><!--end header-->
    <div class="card-body text-secondary">
      {{-- Show reclamation --}}
      @isset($client)
      @forelse ($client->reclamations as $r)
      <div class="card mt-2">
          <div class="card-header bg-dark text-light">
            <span>Réclamé par <strong class="text-success"> {{ $r->user->name }} </strong> </span>
            <span> à {{ date('d-m-Y', strtotime($r->created_at))}}</span>
          </div>
          <div class="card-body row">
              <div class="col-1 d-flex align-items-center justify-content-center">
              <img src="{{ $r->user->profile_photo_path }}" alt="{{ $r->user->name }}"  width="40px" height="40px" class="rounded-circle obFit"/>
              </div>
              <div class="col-11 card-header bg-white">
                {{ $r->commentaire }}
              </div>
          </div>
      </div>
      @empty
      <p>Il n'y a pas de réclamation à ce client</p>
      @endforelse
      @endisset
      @empty($client)
        <div class="card-text">Pas d'information</div>
      @endempty
    </div>
  </div>

@endsection




