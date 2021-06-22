@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome: </label>
<input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $user->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="email">E-mail: </label>
    <input type="text" name="email" class="form-control" placeholder="E-mail" value="{{ $user->email ?? old('email') }}">
</div>
<div class="form-group">
    <label for="password">Password: </label>
    <input type="password" name="password" class="form-control" placeholder="Password">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar alterações</button>
</div>