@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
    <h1>Cadastrar Nova Permissão</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   <form action="{{ route('permissions.store') }}" class="form" method="POST">
                       @csrf

                       @include('admin.pages.permissions._partials.form')
                   </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop