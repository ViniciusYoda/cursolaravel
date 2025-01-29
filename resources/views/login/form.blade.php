@if($mensagem = Session::get('erro'))
{{ $mensagem }}
@endif

@if($errors -> any())
    @foreach($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif

<form action="{{ route('login.authenticate') }}" method="POST">
    @csrf
   Email: <input type="email" name="email" id="email" required>
   Senha: <input type="password" name="password" id="password" required>
   <button type="submit">Entrar</button>
</form>