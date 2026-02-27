@extends('layouts.app')

@section('title', 'User Activities')

@section('content')
    <section class="font-sans h-screen overflow-hidden">
        <div class="flex h-full">

            @include('sidebar.sidebar')

            <div class="flex-1 flex flex-col">
                @include('header.header')

                <div class="p-6 overflow-auto">
                    <h2 class="text-2xl font-bold mb-6">User Login History</h2>

                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-3">#</th>
                                    <th class="p-3">User</th>
                                    <th class="p-3">Login Time</th>
                                    <th class="p-3">Logout Time</th>
                                    <th class="p-3">IP Address</th>
                                    <th class="p-3">Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($activities as $key => $activity)
                                    <tr class="border-t hover:bg-gray-50">
                                        <td class="p-3">{{ $activities->firstItem() + $key }}</td>
                                        <td class="p-3">{{ $activity->user->name }}</td>

                                        <td class="p-3">
                                            {{ $activity->login_at?->format('d M Y, h:i A') }}
                                        </td>

                                        <td class="p-3">
                                            <div class="flex items-center gap-2">

                                                <span class="relative flex items-center justify-center h-3 w-3">

                                                    @if(!$activity->logout_at)
                                                        <span
                                                            class="absolute h-3 w-3 rounded-full bg-green-400 opacity-75 animate-ping"></span>
                                                    @endif

                                                    <span class="relative h-2 w-2 rounded-full 
                                                                {{ $activity->logout_at ? 'bg-gray-400' : 'bg-green-500' }}">
                                                    </span>

                                                </span>

                                                <span class="text-sm font-medium 
                                                            {{ $activity->logout_at ? 'text-gray-500' : 'text-green-600' }}">
                                                    {{ $activity->logout_at ? 'Offline' : 'Online' }}
                                                </span>

                                            </div>
                                        </td>

                                        <td class="p-3">{{ $activity->ip_address }}</td>

                                        <td class="p-3">
                                            @if($activity->logout_at)
                                                {{ $activity->login_at->diffForHumans($activity->logout_at, true) }}
                                            @else
                                                Active
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="p-4 text-center text-gray-500">
                                            No activity found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $activities->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection