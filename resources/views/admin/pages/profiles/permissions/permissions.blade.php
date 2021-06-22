@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permissões do Perfil {{ $profile->name }}</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
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
                    
                    <div class="card-title">
                        <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                            @csrf
                            <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Pesquisar" name="filter" value="{{ $filters['filter'] ?? '' }}">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="card-tools">
                        <a href="{{ route('profiles.permissions.available', $profile->id) }}">
                            <button type="button" class="btn btn-tool bg-gradient-gray btn-sm">
                            <i class="fas fa-plus"></i> Vincular Permissões
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
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger btn-sm" title="Desvincular Permissão">
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
                        {!! $permissions->appends($filters)->links() !!}
                    @else
                        {!! $permissions->links() !!}
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