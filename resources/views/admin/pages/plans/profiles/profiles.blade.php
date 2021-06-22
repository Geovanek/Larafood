@extends('adminlte::page')

@section('title', "Perfis do plano {$plan->name}")

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Perfis do Plano {{ $plan->name }}</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('plans.profiles', $plan->id) }}">Perfis</a></li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{ route('plans.profiles.available', $plan->id) }}">
                            <button type="button" class="btn btn-tool bg-gradient-gray btn-sm">
                            <i class="fas fa-plus"></i> Vincular Perfil
                            </button>
                        </a>
                    </div>
                </div>
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
                            @foreach ($profiles as $profile)
                                <tr>
                                    <td>{{ $profile->name }}</td>
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
                        {!! $profiles->appends($filters)->links() !!}
                    @else
                        {!! $profiles->links() !!}
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