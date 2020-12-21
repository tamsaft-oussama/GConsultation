@extends('layouts.app-user')

@section('content')

<div class="card borderTop">
    <div class="card-body">
        <h4 class="card-title">Ouvrir un ticket</h4>
        <p class="card-text">
            <form action="{{ route('ticket-user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Objet" name="objet">
                </div>
                <div class="form-group">
                    <select class="form-control" name="departement">
                        <option disabled selected>Département</option>
                        <option value="Service Commercial">Service Commercial</option>
                        <option value="Service Commercial">Service Technique</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="priorite">
                    <option disabled selected>Priorité</option>
                    <option value="Haut">Haut</option>
                    <option value="Moyenne">Moyenne</option>
                    <option value="Faible">Faible</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Message" rows="3" name="message"></textarea>
                </div>
                <input type="submit" value="Envoyer" class="btn btn-success btn-sm px-5">
            </form>
        </p>
    </div>
</div>

@endsection



