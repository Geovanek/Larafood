@extends('adminlte::page')

@section('title', "Perfis Disponíveis para {$plan->name}")

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Perfis Disponíveis para {{ $plan->name }}</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('plans.profiles', $plan->id) }}">Disponíveis</a></li>
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
                        <form action="{{ route('plans.profiles.available', $plan->id) }}" method="POST" class="form form-inline">
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
                            <form action="{{ route('plans.profiles.attach', $plan->id) }}" method="POST">
                                @csrf
                                @foreach ($profiles as $profile)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
                                        </td>
                                        <td>{{ $profile->name }}</td>

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