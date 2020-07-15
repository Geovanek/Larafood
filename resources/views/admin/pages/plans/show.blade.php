@extends('adminlte::page')

@section('title', "Detalhes do Plano $plan->name ")

@section('content_header')
    <h1>Detalhes do <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <ul>
                    <li>
                        <strong>Nome: </strong> {{ $plan->name }}
                    </li>
                    <li>
                        <strong>URL: </strong> {{ $plan->url }}
                    </li>
                    <li>
                        <strong>Preço: </strong> R${{ number_format($plan->price, 2, ',', '.') }}
                    </li>
                    <li>
                        <strong>Descrição: </strong> {{ $plan->description }}
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