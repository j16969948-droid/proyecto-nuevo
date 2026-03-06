<h2>Login</h2>

@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="/login">
@csrf

<input type="text" name="telefono" placeholder="Telefono">

<input type="password" name="password" placeholder="Password">

<button type="submit">Ingresar</button>

</form>