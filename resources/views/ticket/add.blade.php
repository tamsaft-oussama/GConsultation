@extends('adminlte::page')

@section('title', '| Page Pack')
@section('content')
  <div class="row">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert" style="margin: 1%; width:100%">
          {{Session::get('success')}}
        </div>
      @endif
      @if($errors->any())
        <div class="alert alert-danger" role="alert" style="margin: 1%; width:100%">
          @foreach ($errors->all() as $error)
              - {{$error}} <br>
          @endforeach
        </div>
      @endif
  </div>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              Ouvrir un ticket
            </h3>
            <!-- tools box -->
            <div class="card-tools">
              <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.card-header -->
          <form action="{{route('ticket.store')}}" method="post">
            @csrf
            <div class="card-body pad">
              <div class="mb-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Objet</label>
                  <input type="text" name="objet" class="form-control" maxlength="100" required>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                      <label>Département</label>
                      <select class="form-control" name="departement">
                        <option value="Service Commercial" selected="selected">Service Commercial</option>
                        <option value="Service Technique">Service Technique</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Priorité</label>
                      <select class="form-control" name="priorite">
                        <option value="Haute">Haute</option>
                      <option value="Moyenne" selected="selected">Moyenne</option>
                      <option value="Faible">Faible</option>
                      </select>
                    </div>
                  </div>
                </div>
                <textarea name="message"></textarea>
              </div>
              <div class="card-footer">
                <a href="{{route('client.index')}}" class="btn btn-default float-right">Annuler</a>
                <button type="submit" class="btn btn-info float-right" style=" margin-right: 2%; ">Envoyer</button>
              </div>
            </div>
        </form>
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
@stop

@section('css')
@stop

@section('js')

<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'message' );
</script>
@stop
