    @vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-950 via-gray-900 to-gray-800">

<div class="w-full max-w-md bg-gray-900/80 backdrop-blur border border-gray-800 rounded-2xl shadow-2xl p-8">

<div class="text-center mb-8">

<h1 class="text-3xl text-white mb-2">
LASSO
</h1>

<p class="text-gray-400 text-sm">
Accede a tu cuenta
</p>

</div>

@if(session('error'))
<div class="mb-6 bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg text-sm">
{{ session('error') }}
</div>
@endif

<form method="POST" action="/login" class="space-y-5">
@csrf

<!-- TELEFONO -->

<div>

<label class="block text-sm text-gray-400 mb-2">
Teléfono
</label>

<input
type="text"
name="telefono"
placeholder="3001234567"
class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
/>

</div>

<!-- PASSWORD -->

<div>

<label class="block text-sm text-gray-400 mb-2">
Contraseña
</label>

<input
type="password"
name="password"
placeholder="••••••••"
class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
/>

</div>

<!-- BOTON -->

<button
type="submit"
class="w-full bg-indigo-600 hover:bg-indigo-500 text-white py-3 rounded-lg font-semibold transition shadow-lg hover:shadow-indigo-500/40">

Ingresar

</button>

</form>

