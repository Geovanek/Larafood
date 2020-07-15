@extends('adminlte::page')

@section('title', "Cadastrar Detalhes ao Plano ")

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadastrar Detalhes ao Plano: {{ $plan->name }}</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('details.plan.create', $plan->url) }}">Cadastrar Detalhes</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   <form action="{{ route('details.plan.store', $plan->url) }}" class="form" method="POST">
                       @csrf

                       @include('admin.pages.plans.details._partials.form')
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