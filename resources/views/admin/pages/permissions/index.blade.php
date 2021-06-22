@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permissões Dashboard</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
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
                        <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
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
                        <a href="{{ route('permissions.create') }}">
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
                                <th style="width: 170px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permisson)
                                <tr>
                                    <td>{{ $permisson->name }}</td>
                                    <td>
                                        <a href="{{ route('permissions.show', $permisson->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('permissions.edit', $permisson->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('permission.profiles', $permisson->id) }}" class="btn btn-secondary btn-sm">
                                            <i class="fas fa-users"></i>
                                        </a>
                                        <form action="{{ route('permissions.destroy', $permisson->id) }}" class="form-horizontal" method="POST" style="display: inline">
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