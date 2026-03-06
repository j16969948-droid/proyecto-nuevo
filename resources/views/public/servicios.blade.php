
@extends('layouts.public')

@section('title','Plataformas Streaming')

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