@extends('adminlte::page')

@section('title', "Editar $profile->name")

@section('content_header')
    <h1>Editar {{ $profile->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
                       @csrf
                       @method('PUT')

                       @include('admin.pages.profiles._partials.form')
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