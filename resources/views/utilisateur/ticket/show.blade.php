@extends('layouts.app-user')

@section('css')
<style>
  .card-comment{
    padding: 10px;
  }
  .quote-secondary{
    padding: 13px;
    border-radius: 40px 40px 40px 0px;
    box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);
    background-color: #fff;
    border-left: 3px solid #baa95a;
    margin-bottom: 1rem;
    padding: 1rem;
  }
  .quote-secondary2{
    background-color: #f2f2dd;
    padding: 13px;
    border-radius: 40px 40px 0px 40px;
    box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);
    border-right: 3px solid #000000;
    margin-bottom: 1rem;
    padding: 1rem;
  }
  @media screen and (max-width: 767px) {
    .ticket-info {
      display: none;
    }
  }
  .message{
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
  }
</style>
@stop

@section('content')
  <div class="col-md-12 mb-5">
    <!-- Box Comment -->
    @if($ticket->etat)
    <div class="alert alert-warning text-center">
      Cette demande est fermée.
    </div>
    @endif
    <div class="card card-widget">
      <div class="card-header">
        <div class="user-block" style="display: flex">
          <img class="img-ticket" src="{{ Auth::user()->profile_photo_path }}" alt="User Image">
          <div class="col-md-5">
              <span class="username"><a href="#">{{$ticket->user->name}}</a></span><br>
              <span class="description">{{date('Y-m-d', strtotime($ticket->created_at))}}</span><br>
              <span class="etat">@if($ticket->etat) <span class="badge badge-danger">Fermé</span> @else <span class="badge badge-success">Ouvert</span> @endif</span>
          </div>
        </div>
        <!-- /.user-block -->
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
          @if ($reponse->personnel)
            <blockquote  class="quote-secondary">
              <div class="row">
                <div class="col-md-3 col-lg-3 mb-3">
                  <div class="text-center" style="width:100%; border-right: 1px solid black;">
                    <img class="img-ticket" src="{{$reponse->user->profile_photo_path }}" alt="User Image"><br>
                    <small>
                      Personnel :
                      <span class='text-primary'>{{$reponse->user->name}}</span> <br>
                      <cite title="Source Title">{{date('Y-m-d h:i A', strtotime($reponse->created_at))}}</cite></small>
                  
                  </div>
                </div>
                <div class="col-md-9 col-lg-9 mb-9">
                  <div class="" style="width:100%;     white-space: pre-line;">
                    @php print $reponse->message @endphp
                  </div>
              </div>
            </div>
            </blockquote>
          @else
            <blockquote  class="quote-secondary2">
              <div class="row">
                <div class="col-md-9 col-lg-9 mb-9">
                  <div class="" style="width:100%;     white-space: pre-line;">
                    @php print $reponse->message @endphp
                  </div>
              </div>
              
              <div class="col-md-3 col-lg-3 mb-3 ticket-info">
                <div class="text-center" style="width:100%;border-left: 1px solid black;">
                  <img class="img-ticket" src="{{$reponse->user->profile_photo_path }}" alt="User Image"><br>
                  <small>
                    Client :
                    <span class='text-primary'>{{$reponse->user->name}}</span> <br>
                    <cite title="Source Title">{{date('Y-m-d h:i A', strtotime($reponse->created_at))}}</cite></small>
                
                </div>
              </div>
            </div>
            </blockquote>
          @endif
        </div>
        @endforeach
      </div>
    </div>
    <!-- /.card -->
  </div>
  @if (!$ticket->etat)
  <div class="col-md-12 mt-5 mb-5 ">
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
              <div class="alert alert-success" role="alert" style="margin: 5px auto; width:95%">
                {{Session::get('success')}}
              </div>
            @endif
            @if(Session::has('danger'))
              <div class="alert alert-danger" role="alert" style="margin: 5px auto; width:95%">
                {{Session::get('danger')}}
              </div>
            @endif
        </div>
        <div class="card-body">
          <textarea class="message" name="message"></textarea>
          <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
          <input type="hidden" name="user_id" value="{{Auth::id()}}">
        </div>
        <!-- /.card-body -->
        <div style="text-align: right; margin:5px" >
          <button type="submit" class="btn btn-gold" style=" margin-right: 2%; ">Ajouter</button>
        </div>
      </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

  </div>
      
  @endif
@stop


 