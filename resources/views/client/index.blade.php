@extends('adminlte::page')

@section('title', '| Page Client')

@section('content_header')
    <h1 class="text-center pt-3" id="text">Gérer Les Clients</h1>
@stop

@section('content')

 <div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Ajouter un client</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <form id='addClient'>
                  @csrf
                    <div class="form-group">
                      <input type="text" class="form-control" id="tel" name="numTel" placeholder="Numéro de téléphone">
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                      @if ($errors->has('numTel'))
                      <span class="text-danger">{{ $errors->first('numTel') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville">
                        @if ($errors->has('numTel'))
                        <span class="text-danger">{{ $errors->first('ville') }}</span>
                        @endif
                    </div>
                    <input type="submit" value="Enregistrer" class="btn btn-info btn-block">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-9">
            <div class="card card-info">
              <div class="card-header">
                <h5 class="float-left">Votre Solde De recherche :</h5>
                <button type="button" class="btn btn-dark float-right">
                  <i class="fas fa-hand-holding-usd"></i> <span class="badge badge-light">{{  $user->count }}</span>
                  <span class="sr-only"></span>
                </button>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <form>
                  @csrf
                    <div class="input-group">
                        <input name="search" type="tel" pattern="[0-9]{10}" class="form-control form-control-lg" placeholder="Saisir le numéro de téléphone de client" required>
                        <div class="input-group-append">
                            <button id="search" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <table class="table table-borderd  text-left">
                    <thead>
                      <tr>
                        <th>Téléphone de client</th>
                        <th>Crédibilité</th>
                        <th>Réclamation</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="result">
                        <td class="text-center" colspan="3">No data</td>
                      </tr>
                    </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
      $('#addClient').submit(function(e){

        e.preventDefault();

        // Les informations de client
        var numTel  = $("input[name=numTel]").val(),
            ville   = $("input[name=ville]").val(),
            user_id = $("input[name=user_id]").val(),
            _token  = $("input[name=_token]").val();
        
        $.ajax({
          url:"{{ route('client.store') }}",
          type:"POST",
          data:{
            numTel:numTel,
            ville:ville,
            user_id :user_id ,
            _token:_token
          },
          success:function(response){
            console.log(response)
            $('#addClient')[0].reset();
          },
        });
      })

      $('#search').click(function(e){
        e.preventDefault();
        numTel  = $("input[name=search]").val();

        $.ajax({
          url:"{{ route('client.store') }}",
          type:"get",
          data:{
            numTel:numTel,
          },
          success:function(response){
            if( response.length !=0 && response[0].numTel!=undefined){
              $('#result').html("<td>"+response[0].numTel+"</td><td><span class='badge bg-danger'>55%</span></td><td>Pas de réclamation</td>");
              $("input[name=search]").val('');
            }else{
              $('#result').html("<td colspan='3' class='text-danger text-center'>Pas d\'information</td>");
            }
          },
        });
        var numTel  = '';

      })
    </script>
@stop
