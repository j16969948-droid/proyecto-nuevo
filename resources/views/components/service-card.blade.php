<div class="bg-gray-900 rounded-2xl overflow-hidden shadow-lg hover:scale-105 transition duration-300">

<div class="h-40 flex items-center justify-center bg-gray-800">

<img 
src="{{ $servicio->imagen }}" 
alt="{{ $servicio->nombre }}"
class="h-30">

</div>

<div class="p-6">

<h3 class="text-lg font-semibold mb-2">
{{ $servicio->nombre }}
</h3>

<p class="text-gray-400 text-sm mb-4">
Acceso premium disponible
</p>

<div class="flex justify-between items-center">

<div class="text-xl font-bold text-indigo-400">

${{ $servicio->precio_publico }}

</div>

<button
onclick="addToCart({{ $servicio->id }}, '{{ $servicio->nombre }}', {{ $servicio->precio_publico }})"
class="bg-indigo-600 hover:bg-indigo-500 px-4 py-2 rounded-lg text-sm">

Agregar

</button>

</div>

</div>

</div>