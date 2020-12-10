@extends('adminlte::page')

@section('title', '| Page Historique')

@section('content_header')
    {{-- <h3 class="text-center pt-3">Gérer les clients</h3> --}}
@stop

@section('content')

 <div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-danger"><i class="fas fa-list"></i> Historique de votre recherche</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search" id="search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default" >
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap" id="employee_table">
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
            <!-- /.card -->
          </div>
    </div>
 </div>

 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
      $(document).ready(function(){

        $('#search').keyup(function(){  
          search_table($(this).val());  
        });  

           function search_table(value){  
                $('#employee_table tbody tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           } 

      });
    </script>
@stop
