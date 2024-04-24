@extends('layout.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manager Kategori</div>

            <div class="card-body">
                <a href="/kategori/create" class="btn btn-primary mb-3" >+Add</a>
                {{$dataTable->table()}}
               
            </div>
        </div>
    </div>
@endsection

@push('css')
    
   <link rel="stylesheet"
   href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
@endpush

@push('js')
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    {{$dataTable->scripts()}}
@endpush