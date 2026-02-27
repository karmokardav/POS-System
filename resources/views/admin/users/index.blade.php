@extends('layouts.app')

@section('title', 'Users Management')

@section('content')
    <section class="font-sans h-screen overflow-hidden">
        <div class="flex h-full">

            @include('sidebar.sidebar')

            <div class="flex-1 flex flex-col">
                @include('header.header')

                <div class="p-6 overflow-auto">
                    <h2 class="text-2xl font-bold mb-6">Users Management</h2>
                    <!-- Users Table -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-3">id</th>
                                    <th class="p-3">Name</th>
                                    <th class="p-3">Email</th>
                                    <th class="p-3">Role</th>
                                    <th class="p-3">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($users as $key => $user)
                                                        <tr class="border-t hover:bg-gray-50 transition">
                                                            <td class="p-3">{{ $key + 1 }}</td>
                                                            <td class="p-3">{{ $user->name }}</td>
                                                            <td class="p-3">{{ $user->email }}</td>
                                                            <td class="p-3">
                                                                @foreach($user->roles as $role)
                                                                    <span class="px-2 py-1 text-sm bg-brand-50 text-[#c3592b] rounded">
                                                                        {{ $role->name }}
                                                                    </span>
                                                                @endforeach
                                                            </td>

                                                            <td class="p-3">
                                                                <div class="flex items-center gap-2">
                                                                    <span class="relative flex items-center justify-center h-3 w-3">
                                                                        <span class="absolute h-3 w-3 rounded-full bg-green-400 opacity-75 animate-ping"></span>
                                                                        <span class="relative h-2 w-2 rounded-full 
                                                                            {{ $user->isOnline() ? 'bg-green-500' : 'bg-gray-400' }}">
                                                                        </span>
                                                                    </span>


                                                                    <span class="font-medium">
                                                                        {{ $user->isOnline() ? 'Online' : 'Offline' }}
                                                                    </span>
                                                                </div>

                                                                <div>
                                                                    <div class="flex">
                                                                        <h1 class="text-xs font-medium">Active:</h1>
                                                                        <p class="ml-1 text-xs text-gray-500">{{ $user->activeTime() }}</p>
                                                                    </div>
                                                                </div>

                                                                <div class="flex">
                                                                    <h1 class="text-xs font-medium">Last Seen:</h1>
                                                                    <p class="ml-1 text-xs text-gray-500">{{ $user->last_seen
                                    ? $user->last_seen->format('d M Y, h:i A')
                                    : 'Never' }}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-4 text-center text-gray-500">
                                            No users found.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection