<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Utilisateur</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<style>
  @media screen and (max-width: 575px) {
    .capitalize {
      display: none;
    }
  }
  a {
    text-decoration: none;
    color: black;
  }
</style>
  @yield('css')

</head>
<body>

  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
      <a class="navbar-brand text-white" href="#">Logo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('utilisateur.index') }}">Espace Client</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('client-user.index') }}">Consultation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('utilisateur-pack.index') }}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ticket-user.index') }}">Ouvrir un ticket</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" style="object-fit: cover!important;" width="25px"  height="25px" class="rounded-circle">
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ route('profile-user.index') }}"><i class="fas fa-user text-gold"></i> Profile</a>
              <a class="dropdown-item" href="{{ route('historique-user.userIndex') }}"><i class="fas fa-history text-gold"></i> Historique</a>
              <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="cursor:pointer">
                <i class="fa fa-fw fa-power-off text-danger"></i>
                Déconnecter
              </a>
              <form id="logout-form" action="/logout" method="POST" style="display: none;">
              @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid-md container-lg mt-4">
    <div class="row">

      <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 capitalize">
        <div class="card borderTop mb-3" style="max-width:100%">
          <div class="card-header"><i class="fas fa-user"></i> Vos informations</div>
          <div class="card-body text-secondary">
            <h6 class="card-title"><i class="fas fa-user-tie"></i> {{ $user->name }}</h6>
            <p class="card-text"><i class="fas fa-envelope-open-text"></i> {{ $user->email }}</p>
            <p class="card-text"><i class="fas fa-search"></i> resté {{ $user->count }} points</p>
          </div>
        </div>
        <div class="card borderTop mb-3" style="max-width:100%">
          <div class="card-header"><a href="{{ route('ticket.all') }}"><i class="fas fa-scroll"></i> Vos dernières demandes </a></div>
          <div class="card-body text-secondary px-0 py-0">
            <ul class="list-group">
              @forelse(Auth::user()::getUserTickets(Auth::user()) as $ticket)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('ticket-user.show',['ticket_user'=>$ticket->id]) }}">{{ $ticket->objet }}</a> 
                @if ($ticket->etat)
                <span class="badge badge-danger badge-pill">Fermé</span>
                @else
                <span class="badge badge-success badge-pill">Ouvert</span>
                @endif
                @if(!$ticket->lue) 
                  <span class="badge badge-danger">Support</span>
                @endif
              </li>
              @empty
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Aucun résultat trouvé
                <span class="badge badge-success badge-pill">0</span>
              </li>
              @endforelse
            </ul>
          </div>
        </div>
        <div class="card borderTop mb-3 userCard">
          <h5 class="card-header">
              <a data-toggle="collapse" href="#collapse-example" aria-expanded="true" aria-controls="collapse-example" id="heading-example" class="text-dark d-block">
                  <i class="fa fa-chevron-down pull-right"></i>
                  Ajouter un client
              </a>
          </h5>
          <div id="collapse-example" class="collapse hide" aria-labelledby="heading-example">
              <div class="card-body">
                <form method="POST" action="{{ route('client-user.store') }}">
                  @csrf
                  @method('POST')
                    <div class="form-group">
                        @if ($errors->has('numTel'))
                        <span class="text-danger">{{ $errors->first('numTel') }}</span>
                        @endif
                      <input type="text" class="form-control" style=" height: calc(14px + 0.75rem + 2px); " id="tel" name="numTel" placeholder="Numéro de téléphone">
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" style=" height: calc(14px + 0.75rem + 2px); " id="nom" name="nom" placeholder="Nom">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" style=" height: calc(14px + 0.75rem + 2px); " id="ville" name="ville" placeholder="Ville">
                    </div>
                    <div class="form-group">
                      @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                      <input type="text" class="form-control" style=" height: calc(14px + 0.75rem + 2px); " id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      @if ($errors->has('commentaire'))
                          <span class="text-danger">{{ $errors->first('commentaire') }}</span>
                      @endif
                      <textarea class="form-control" style=" height: 50px; " rows="3" name="commentaire" placeholder="Posé votre déclaration"></textarea>
                      <input type="hidden" name="user" value="{{ $user->id }}">
                    </div>
                      <button type="submit" class="btn btn-gold btn-block btn-sm"><i class="fas fa-save"></i> Enregistrer </button>
                </form>
              </div>
          </div>
      </div>
      </div>

      <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
        @yield('content')
      </div>
    </div>
  </div>

<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
  $(document).ready( function () {
    $('#table_id').DataTable({
      "pageLength": 5,
      "lengthMenu": [ 5,10, 25, 50, 75, 100 ],
      "language": {
          "zeroRecords": "Aucun résultat trouvé",
          "info": "Affichage de la page _PAGE_ sur _PAGES_",
          "infoEmpty": "Aucun enregistrement disponible",
          "paginate": {
            "next":       "Suivant",
            "previous":   "Retour"
          },
        }
    });
  });
</script>
@yield('js')

</body>
</html>
