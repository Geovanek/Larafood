@extends('adminlte::page')

@section('title', "Detalhes da Permissão $permissions->name ")

@section('content_header')
    <h1>Detalhes da Permissão <b>{{ $permissions->name }}</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <ul>
                    <li>
                        <strong>Nome: </strong> {{ $permissions->name }}
                    </li>
                    <li>
                        <strong>Descrição: </strong> {{ $permissions->description }}
                    </li>
                </ul>
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