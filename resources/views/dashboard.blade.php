@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <section class="font-sans h-screen overflow-hidden">
        <div class="flex h-full">

            <!-- Sidebar -->
            @include('sidebar.sidebar')

            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <div>
                    <h1 class="text-2xl font-bold text-white p-6">
                        Dashboard
                    </h1>
                </div>
            </div>
        </div>
    </section>
@endsection