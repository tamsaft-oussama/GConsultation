@extends('layouts.app-user')

@section('content')

<form method="POST" action="{{ route('profile-user.store') }}"  enctype="multipart/form-data">
    @csrf
    <div class="card borderTop" style="min-height: 450px !important">
        <div class="card-body row">
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="name">Nom & Prénom</label>
                    <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Ancien mot de passe</label>
                    <input type="password" class="form-control" id="password" name="oldpassword">
                </div>
                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="tel">Téléphone</label>
                    <input type="text" class="form-control" id="tel" value="{{ Auth::user()->tel }}" name="tel">
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" id="ville" value="{{ Auth::user()->ville }}" name="ville">
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" value="{{ Auth::user()->adresse }}" name="adresse">
                </div>
                <div class="form-group text-center">
                    <img style="object-fit: cover;" class="rounded-circle" src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" width="150px" height="150px">
                </div>
                <div class="form-group text-center">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image" data-browse="Importer Image"><i class="fas fa-camera-retro text-success" style="font-size: 25px;"></i></label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-gold btn-md btn-block"><i class="fas fa-save"></i> Enregistrer</button>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('profile-user.destroy') }}" class="btn btn-danger btn-md btn-block"><i class="fas fa-trash"></i> Supprimer mon compte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection