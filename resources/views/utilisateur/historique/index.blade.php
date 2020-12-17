@extends('layouts.app-user')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card borderTop">
            <div class="card-header">
                <i class="fas fa-list"></i> Historique de votre recherche
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-2">
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
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection



