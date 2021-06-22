@extends('adminlte::page')

@section('title', "Detalhes do Usuário $user->name ")

@section('content_header')
    <h1>Detalhes do <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <ul>
                    <li>
                        <strong>Nome: </strong> {{ $user->name }}
                    </li>
                    <li>
                        <strong>E-mail: </strong> {{ $user->email }}
                    </li>
                    <li>
                        <strong>Empresa: </strong> {{ $user->tenant->name }}
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
    <script> console.log('Hi Larafood!'); </script>
@stop