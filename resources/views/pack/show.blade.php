@extends('layouts.app-user')

@section('content')

<div class="invoice p-3 mb-3">
  <form role="form" action="{{route('paiement.add')}}" method="post">
    @csrf
  <!-- title row -->
  <div class="row">
    <div class="col-12">
      <h4>
        <i class="fas fa-globe"></i> Mounir Consultation, Sarl.
        <small class="float-right">Date: {{$now}}</small>
      </h4>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      De
      <address>
        <strong>{{$user->name}}</strong><br>
        ville: Rabat<br>
        Phone: (804) 123-5432<br>
        Email: {{$user->email}}
      </address>
    <input type="hidden" value="{{$user->id}}" name="user_id">
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      À
      <address>
        <strong>Mounir Consultation, Sarl.</strong><br>
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>Facture #@if($facture!=0){{$facture->id+1}} @else 1 @endif</b><br>
      <br>
    <b>Paiement dû:</b> {{$now}}<br>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Solde</th>
          <th>Pack</th>
          <th>Description</th>
          <th>Prix</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>{{$pack->solde ?? ''}}</td>
          <td>{{$pack->titre}}</td>
          <td>{{$pack->description}}</td>
          <td>{{$pack->prix}} Mad</td>
        </tr>
         <input type="hidden" value="{{$pack->id}}" name="pack_id">
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-6">
      <p class="lead">méthodes de Payement:</p>
      <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/visa.png" alt="Visa">
      <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/mastercard.png" alt="Mastercard">
      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
        plugg
        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
      </p>
    </div>
    <!-- /.col -->
    <div class="col-6">
      <p class="lead">Montant dû {{$now}}</p>

      <div class="table-responsive">
        <table class="table">
          <tbody>
          <tr>
            <th>Total:</th>
            <td>{{$pack->prix}} Mad</td>
          </tr>
        </tbody></table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-12">
      <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Imprimer</a>
      {{-- <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Aller au Paiement
      </button> --}}
      <div id="paypal-button-container" style="width:25%; margin:auto"></div>

      <!-- Include the PayPal JavaScript SDK -->
      <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

      <script>
          // Render the PayPal button into #paypal-button-container
          paypal.Buttons({

              style: {
                  color:  'blue',
                  shape:  'pill',
                  label:  'pay',
                  height: 40
              }

          }).render('#paypal-button-container');
      </script>
    </div>
  </div>
  </form>
</div>

@endsection
