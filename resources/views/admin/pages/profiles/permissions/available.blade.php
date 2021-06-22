@extends('adminlte::page')

@section('title', "Permissões Disponíveis para {$profile->name}")

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permissões Disponíveis para {{ $profile->name }}</h1>
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
                        <form action="{{ route('profiles.permissions.available', $profile->id) }}" method="POST" class="form form-inline">
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
                </div>
                <div class="card-body">

                    @include('admin.includes.alerts')
                    
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th style="width: 40px">#</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('profiles.permissions.attach', $profile->id) }}" method="POST">
                                @csrf
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                        </td>
                                        <td>{{ $permission->name }}</td>

                                    </tr>
                                @endforeach
                                    <tr>
                                        <td colspan="10">
                                            @include('admin.includes.alerts')
                                            <button type="submit" class="btn btn-dark">Vincular</button>
                                        </td>
                                    </tr>
                            </form>
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