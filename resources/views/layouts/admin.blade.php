@extends('layouts.app')

@section('body')

@include('components.navbar')

<div class="layout">

    @include('components.sidebar-admin')

    <main class="content">

        @yield('content')

    </main>

</div>

@endsection