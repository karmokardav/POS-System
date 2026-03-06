@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <section class="font-sans h-screen overflow-hidden">
        <div class="flex h-full">

            @include('sidebar.sidebar')

            <div class="flex-1 flex flex-col">

                @include('header.header')

                <div class="p-6 overflow-y-auto">

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif


                    {{-- Top Bar --}}
                    <div class="flex justify-between items-center mb-6">

                        <h2 class="text-xl font-semibold">Products</h2>

                        <a href="{{ route('products.create') }}"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                            Add Product
                        </a>

                    </div>


                    {{-- PRODUCT GRID --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                        @forelse($products as $product)

                            <div class="bg-white shadow rounded-lg overflow-hidden">

                                {{-- IMAGE --}}
                                <div class="h-40 bg-gray-100 flex items-center justify-center">

                                    @if($product->image)

                                        <img src="{{ asset('uploads/products/' . $product->image) }}"
                                            class="h-full w-full object-cover">

                                    @else

                                        <span class="text-gray-400 text-sm">No Image</span>

                                    @endif

                                </div>


                                {{-- BODY --}}
                                <div class="p-4">

                                    <h3 class="font-semibold text-lg mb-1">
                                        {{ $product->name }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mb-2">
                                        {{ $product->category->name ?? '-' }}
                                    </p>

                                    <p class="text-sm text-gray-500 mb-2">
                                        Brand: {{ $product->brand->name ?? '-' }}
                                    </p>

                                    <p class="text-sm text-gray-500 mb-2">
                                        SKU: {{ $product->sku }}
                                    </p>


                                    {{-- PRICE --}}
                                    <div class="text-lg font-semibold text-green-600 mb-2">

                                        @if($product->defaultPrice)

                                            $ {{ $product->defaultPrice->price }}

                                        @endif

                                    </div>


                                    {{-- STATUS --}}
                                    @if($product->status == 'active')

                                        <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">
                                            Active
                                        </span>

                                    @else

                                        <span class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded">
                                            Inactive
                                        </span>

                                    @endif


                                    {{-- ACTION --}}
                                    <div class="flex justify-between mt-4">

                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="text-blue-600 text-sm font-medium">
                                            Edit
                                        </a>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('Delete this product?')"
                                                class="text-red-600 text-sm font-medium">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <p>No Products Found</p>

                        @endforelse

                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection