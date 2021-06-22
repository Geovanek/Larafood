@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
<input type="text" name="name" placeholder="Nome" class="form-control" value="{{ $permission->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="name">Descrição:</label>
<input type="text" name="description" placeholder="Descrição" class="form-control" value="{{ $permission->description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>