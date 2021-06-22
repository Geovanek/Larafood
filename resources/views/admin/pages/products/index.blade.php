@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Produtos</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Produtos</a></li>
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
                        <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
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
                        <a href="{{ route('products.create') }}">
                            <button type="button" class="btn btn-tool bg-gradient-gray btn-sm">
                            <i class="fas fa-plus"></i> Novo Produto
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
                                <th style="width: 50px"></th>
                                <th>Título</th>
                                <th>Preço</th>
                                <th>Descrição</th>
                                <th style="width: 130px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->image }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" class="form-horizontal" method="POST" style="display: inline">
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
                        {!! $products->appends($filters)->links() !!}
                    @else
                        {!! $products->links() !!}
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