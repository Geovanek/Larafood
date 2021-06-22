@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Perfils Dashboard</h1>
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
                        <a href="{{ route('profiles.create') }}">
                            <button type="button" class="btn btn-tool bg-gradient-gray btn-sm">
                            <i class="fas fa-plus"></i> Novo
                            </button>
                        </a>
                        <button type="button" class="btn btn-tool">
                          <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    @include('admin.includes.alerts')
                    
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th style="width: 210px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                                <tr>
                                    <td>{{ $profile->name }}</td>
                                    <td>
                                        <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-info btn-sm" title="Exibir Perfil">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning btn-sm" title="Editar Perfil">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-secondary btn-sm" title="Visualizar Permissões">
                                            <i class="fas fa-lock"></i>
                                        </a>
                                        <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-outline-secondary btn-sm" title="Visualizar Plano">
                                            <i class="fas fa-list-alt"></i>
                                        </a>
                                        <form action="{{ route('profiles.destroy', $profile->id) }}" class="form-horizontal" method="POST" style="display: inline" title="Excluir Perfil">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
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