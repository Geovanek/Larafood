@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Usuários</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuários</a></li>
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
                        <form action="{{ route('users.search') }}" method="POST" class="form form-inline">
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
                        <a href="{{ route('users.create') }}">
                            <button type="button" class="btn btn-tool bg-gradient-gray btn-sm">
                            <i class="fas fa-plus"></i> Novo Usuário
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
                                <th>E-mail</th>
                                <th style="width: 130px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" class="form-horizontal" method="POST" style="display: inline">
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
                        {!! $users->appends($filters)->links() !!}
                    @else
                        {!! $users->links() !!}
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
    <script> console.log('Hi Larafood!'); </script>
@stop