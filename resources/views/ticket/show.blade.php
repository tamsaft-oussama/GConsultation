@extends('adminlte::page')

@section('title', '| Page Ticket')
@section('content')
  <div class="col-md-12">
    <!-- Box Comment -->
    <div class="card card-widget">
      <div class="card-header">
        <div class="user-block">
          <img class="img-circle" src="https://ui-avatars.com/api/?name=nahri+mehdi&color=7F9CF5&background=EBF4FF" alt="User Image">
          <span class="username"><a href="#">{{$ticket->user->name}}</a></span><br>
          <span class="description">{{date('Y-m-d', strtotime($ticket->created_at))}}</span>
        </div>
        <!-- /.user-block -->
        
        <div class="card-tools"> 
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
          </button>
        </div>
        <div class="card-tools" style=" margin-right: 2%; ">
          @if ($ticket->etat)
            <small class="badge badge-danger"><i class="far fa-clock"></i> Fermé</small>
          @else
          <form role="form" action="{{ route('ticket.update',['ticket' => $ticket]) }}" method="post">
            @csrf
            @method('PUT')
            <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i> Fermer</button>
          </form>
          @endif
        </div>
        <!-- /.card-tools -->
      </div>
      <div class="row">
        @if(Session::has('success2'))
            <div class="alert alert-success" role="alert" style="margin: 1%; width:100%">
              {{Session::get('success2')}}
            </div>
          @endif
          @if(Session::has('dange2r'))
            <div class="alert alert-danger" role="alert" style="margin: 1%; width:100%">
              {{Session::get('danger2')}}
            </div>
          @endif
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @php print $ticket->message @endphp
      </div>
      <!-- /.card-body -->
      <div class="card-footer card-comments">
        @foreach ($ticket->reponses as $reponse)
        <div class="card-comment">
          <blockquote @if ($reponse->personnel) class="quote-secondary"@endif>
            @php print $reponse->message @endphp
            <div style=" text-align: end; "><small>@if ($reponse->personnel)
                Personnel :
                @else
                Client :
            @endif<span class='text-primary'>{{$reponse->user->name}}</span> ,<cite title="Source Title">{{date('Y-m-d h:i A', strtotime($reponse->created_at))}}</cite></small>
            </div>
          </blockquote>
        </div>
        @endforeach
      </div>
    </div>
    <!-- /.card -->
  </div>
  @if (!$ticket->etat)
  <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Ajouter Une Reponse</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{route('reponse.store')}}" method="post">
        @csrf
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
        <div class="card-body">
          <textarea name="message"></textarea>
          <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
          <input type="hidden" name="user_id" value="{{Auth::id()}}">
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-info float-right" style=" margin-right: 2%; ">Ajouter</button>
        </div>
      </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

  </div>
      
  @endif
@stop

@section('css')

@stop

@section('js')
<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'message' );
</script>
@stop
