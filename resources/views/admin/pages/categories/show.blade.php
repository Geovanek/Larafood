@extends('adminlte::page')

@section('title', "Detalhes da Categoria $category->name ")

@section('content_header')
    <h1>Detalhes da Categoria <b>{{ $category->name }}</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <ul>
                    <li>
                        <strong>Nome: </strong> {{ $category->name }}
                    </li>
                    <li>
                        <strong>Descrição: </strong> {{ $category->description }}
                    </li>
                    <li>
                        <strong>URL: </strong> {{ $category->url }}
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