@extends('layouts.app-user')

@section('content')

<div class="row">
    <div class="col-md-6 col-lg-3 mb-3">
        <div class="card borderTop" style="width:100%;">
            <div class="card-body text-center">
                <i class="fas fa-search fa-2x text-success mb-2"></i>
                <p>{{ count($historiques) }}</p>
                <h6>Vos recherches</h6>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-3">
        <div class="card borderTop" style="width:100%;">
            <div class="card-body text-center">
                <i class="fas fa-exclamation fa-2x text-success mb-2"></i>
                <p>{{ $reclamations }}</p>
               <h6>Vos réclamations</h6>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-3">
        <div class="card borderTop" style="width:100%;">
            <div class="card-body text-center">
                <i class="fas fa-search-dollar fa-2x text-success mb-2"></i>
                <p>{{ $user->count }}</p>
                <h6>Votre solde</h6>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-3">
        <div class="card borderTop" style="width:100%;">
            <div class="card-body text-center">
                <i class="fas fa-users fa-2x text-success mb-2"></i>
                <p>0</p>
                <h6>Vos clients</h6>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card borderTop">
            <div class="card-body">
                <table class="table table-head-fixed text-nowrap" id="table_id">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tél de client</th>
                        <th>La Date de recherche</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($historiques as $item)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tel_client }}</td>
                        <td>{{ $item->created_at }}</td>
                        </tr>
                        @empty
                        <tr>
                        <td colspan="3"><div class="alert alert-info">Vous n'avez pas fait aucun recherche </div></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        $('#table_id').dataTable( {
            "pageLength": 5,
            "lengthMenu": [ 5,10, 25, 50, 75, 100 ]
        } );
    </script>
@endsection

