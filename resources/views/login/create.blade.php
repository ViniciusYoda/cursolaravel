@if($errors -> any())
    @foreach($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    Nome: <input type="text" name="firstName" id="name" required>
    Sobrenome: <input type="text" name="lastName" id="last_name" required>
   Email: <input type="email" name="email" id="email" required>
   Senha: <input type="password" name="password" id="password" required>
   <button type="submit">Cadastrar</button>
</form>