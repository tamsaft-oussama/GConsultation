@extends('adminlte::page')

@section('title', '| Page Client')

@section('content_header')
    {{-- <h3 class="text-center pt-3">Chaque recherche que vous effectuez soustrait un point à votre solde</h3> --}}
@stop

@section('content')

 <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-lg-4">

        <div class="card card-danger card-outline">
          <div class="card-header"><h5 class="card-title">Client information</h5></div>
          <div class="card-body">
            <div class="callout callout-danger">
              <h6><span class="">Nom :{{ $data->nom ?? 'inconnu' }}</span></h6>
              <h6><span class="">Ville :{{ $data->ville }}</span></h6>
              <h6><span class="">Email :{{ $data->email ?? 'inconnu' }}</span></h6>
              <h6><span class="">Tel :{{ $data->numTel  }}</span></h6>
            </div>
          </div>
        </div><!-- /.card -->
      </div>
      <div class="col-md-8">            
        <div class="card card-outline card-danger">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-lightbulb"></i>
              <span class="info-box-text">Crédibilité :</span>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @forelse ($data->reclamations as $r)
            <div class="callout callout-danger">
              <h5>Posté à {{ $r->created_at }}</h5>
              <p>{{ $r->commentaire }}</p>
            </div>
            @empty
            <div class="callout callout-danger">
              <p>Il n'y a pas de réclamation à ce client</p>
            </div>
            @endforelse
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
 </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

    </script>
@stop
