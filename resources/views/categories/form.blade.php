@extends('layouts.app')

@section('title', $category->id ? 'Edit Category' : 'Create Category')

@section('content')
    <section class="font-sans h-screen overflow-hidden">
        <div class="flex h-full">

            @include('sidebar.sidebar')

            <div class="flex-1 flex flex-col">
                @include('header.header')

                <div class="p-6 overflow-auto">
                    <div class="bg-white shadow rounded-lg p-6 max-w-xl">

                        <h2 class="text-xl font-bold mb-6">
                            {{ $category->id ? 'Edit Category' : 'Add Category' }}
                        </h2>

                        <form action="{{ $category->id
        ? route('categories.update', $category->id)
        : route('categories.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @if($category->id)
                                @method('PUT')
                            @endif

                            <!-- Name -->
                            <div class="mb-4">
                                <label class="block mb-1 font-medium">Category Name</label>
                                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-400">
                            </div>

                            <!-- Parent -->
                            <div class="mb-4">
                                <label class="block mb-1 font-medium">Parent Category</label>

                                <select name="parent_id" class="w-full border rounded px-3 py-2">

                                    <option value="">Primary</option>

                                    @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                                            {{ $parent->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <!-- Image -->
                            <div class="mb-4">
                                <label class="block mb-1 font-medium">Image</label>
                                <input type="file" name="image" class="w-full border rounded px-3 py-2">

                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}"
                                        class="w-20 h-20 mt-2 rounded object-cover">
                                @endif
                            </div>

                            <!-- Status -->
                            <div class="mb-6">
                                <label class="block mb-1 font-medium">Status</label>
                                <select name="status" class="w-full border rounded px-3 py-2">

                                    <option value="Publish" {{ old('status', $category->status) == 'Publish' ? 'selected' : '' }}>
                                        Publish
                                    </option>

                                    <option value="Inactive" {{ old('status', $category->status) == 'Inactive' ? 'selected' : '' }}>
                                        Inactive
                                    </option>

                                </select>
                            </div>

                            <button type="submit"
                                class="px-5 py-2 bg-blue-500 text-white rounded hover:bg-brand-600 transition">
                                {{ $category->id ? 'Update Category' : 'Save Category' }}
                            </button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection