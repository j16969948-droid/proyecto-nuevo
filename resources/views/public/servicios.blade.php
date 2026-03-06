
@extends('layouts.public')

@section('title','Plataformas Ventas')

@section('content')

{{-- HERO SECTION --}}
<section class="py-20">

<div class="max-w-7xl mx-auto px-6 text-center">

<h1 class="text-4xl md:text-5xl font-bold mb-6">
Todas tus plataformas favoritas
</h1>

<p class="text-gray-400 max-w-2xl mx-auto mb-10">
Compra accesos a Netflix, Disney+, Spotify y más plataformas al mejor precio.
</p>

</div>

</section>


{{-- GRID DE SERVICIOS --}}
<section class="pb-24">

<div class="max-w-7xl mx-auto px-6">

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

@foreach($servicios as $servicio)

@include('components.service-card',['servicio'=>$servicio])

@endforeach

</div>

</div>

</section>

@endsection

<div id="cartBar"
class="fixed bottom-0 left-0 w-full bg-white border-t shadow-2xl z-50 hidden">

<div class="max-w-7xl mx-auto px-6 py-4">

<div class="flex items-center justify-between mb-4">

<div class="flex items-center gap-3">

</div>

<div id="cartTotal" class="text-gray text-xl font-bold text-indigo-600">
$0
</div>

</div>

<div id="cartItems"
class="flex flex-wrap gap-4 mb-4">

</div>

<div class="flex items-center justify-between border-t pt-4">

<div class="text-gray-500 text-sm">
Puedes seguir agregando más plataformas
</div>

<button
class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-2 rounded-lg font-semibold transition">

Comprar ahora

</button>

</div>

</div>

</div>