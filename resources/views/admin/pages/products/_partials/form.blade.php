@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome: </label>
<input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $category->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="description">Descrição</label>: </label>
    <textarea name="description" class="form-control" cols="30" rows="5">{{ $category->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>