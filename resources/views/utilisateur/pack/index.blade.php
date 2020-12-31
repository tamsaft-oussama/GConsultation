@extends('layouts.app-user')

@section('content')

<div class="card borderTop">
    <div class="card-body">
        <div class="row">
            @foreach ($packs as $pack)
            <div class="col-md-4">
                <div class="pricing-table">
                  <div class="ptable-item">
                    <div class="ptable-single  d-flex flex-column">
                      <div class="ptable-header">
                        <div class="ptable-title">
                          <h2>{{ $pack->offre }}</h2>
                        </div>
                        <div class="ptable-price">
                          <h3>{{ $pack->prix }} <small>DH</small></h3>
                        </div>
                      </div>
                      <div class="ptable-body">
                        <div class="ptable-description">
                          <ul>
                            <li>{{ $pack->titre }}</li>
                            <li><span style="font-weight: bold;">{{ $pack->solde }}</span> <small>consultation</small></li>
                            <li>{{ $pack->description }}</li>
                          </ul>
                        </div>
                      </div>
                      <div class="ptable-footer mt-auto">
                        <div class="ptable-action">
                          <a href="{{ route('utilisateur-pack.show',['utilisateur_pack' => $pack->id]) }}" class="btn btn-gold">Acheter</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection



