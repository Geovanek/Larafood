@extends('adminlte::page')

@section('title', "Planos do Perfil {$profile->name}")

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Planos do Perfil {{ $profile->name }}</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('profiles.plans', $profile->id) }}" class="active">Planos</a></li>
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

                    @include('admin.includes.alerts')
                    
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th style="width: 40px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plans as $plan)
                                <tr>
                                    <td>{{ $plan->name }}</td>
                                    <td>
                                        <a href="{{ route('plans.profiles.detach', [$plan->id, $profile->id]) }}" class="btn btn-danger btn-sm" title="Desvincular Permissão">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    @if (isset($filters))
                        {!! $plans->appends($filters)->links() !!}
                    @else
                        {!! $plans->links() !!}
                    @endif
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