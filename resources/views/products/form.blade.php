@extends('layouts.app')

@section('title', isset($product) ? 'Edit Product' : 'Add Product')

@section('content')

    <section class="font-sans h-screen overflow-hidden">

        <div class="flex h-full">

            @include('sidebar.sidebar')

            <div class="flex-1 flex flex-col">

                @include('header.header')

                <div class="p-6 overflow-auto bg-gray-50">

                    <div class="flex justify-between items-center mb-6">

                        <h2 class="text-2xl font-bold">
                            {{ isset($product) ? 'Edit Product' : 'Add Product' }}
                        </h2>

                        <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                            Back
                        </a>

                    </div>


                    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
                        method="POST" enctype="multipart/form-data">

                        @csrf
                        @if(isset($product))
                            @method('PUT')
                        @endif


                        <div class="grid grid-cols-3 gap-6">

                            {{-- LEFT --}}
                            <div class="col-span-2 space-y-6">

                                {{-- PRODUCT INFO --}}
                                <div class="bg-white p-6 rounded shadow border">

                                    <h3 class="font-semibold mb-4 border-b pb-2">Product Information</h3>

                                    <div class="mb-4">
                                        <label class="block text-sm mb-1">Product Name</label>

                                        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
                                            class="w-full border rounded px-3 py-2">
                                    </div>

                                    <div>
                                        <label class="block text-sm mb-1">Description</label>

                                        <textarea name="description" rows="4"
                                            class="w-full border rounded px-3 py-2">{{ old('description', $product->description ?? '') }}</textarea>
                                    </div>

                                </div>


                                {{-- STATUS --}}
                                <div class="bg-white p-6 rounded shadow border">

                                    <h3 class="font-semibold mb-4 border-b pb-2">Status</h3>

                                    <select name="status" class="w-full border rounded px-3 py-2">

                                        <option value="active" {{ old('status', $product->status ?? '') == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>

                                        <option value="inactive" {{ old('status', $product->status ?? '') == 'inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>

                                    </select>

                                </div>


                                {{-- CATEGORY --}}
                                <div class="bg-white p-6 rounded shadow border">

                                    <h3 class="font-semibold mb-4 border-b pb-2">Category</h3>

                                    <div class="grid grid-cols-2 gap-4">

                                        <div>

                                            <label class="block text-sm mb-1">Category</label>

                                            <select id="category" name="category_id"
                                                class="w-full border rounded px-3 py-2">

                                                <option value="">Select Category</option>

                                                @foreach($categories->whereNull('parent_id') as $cat)

                                                    <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                                        {{ $cat->name }}
                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>


                                        <div>

                                            <label class="block text-sm mb-1">Sub Category</label>

                                            <select id="subCategory" name="sub_category_id"
                                                class="w-full border rounded px-3 py-2">

                                                <option value="">Select Sub Category</option>

                                            </select>

                                        </div>

                                    </div>

                                </div>


                                {{-- STOCK --}}
                                <div class="bg-white p-6 rounded shadow border">

                                    <h3 class="font-semibold mb-4 border-b pb-2">Stock</h3>

                                    <div class="grid grid-cols-2 gap-4">

                                        <div>
                                            <label class="block text-sm mb-1">SKU</label>

                                            <input type="text" name="sku"
                                                value="{{ old('sku', $product->sku ?? $sku ?? '') }}" readonly
                                                class="w-full border rounded px-3 py-2 bg-gray-100">
                                        </div>

                                        <div>
                                            <label class="block text-sm mb-1">Minimum Stock</label>

                                            <input type="number" name="minimum_stock"
                                                value="{{ old('minimum_stock', $product->minimum_stock ?? '') }}"
                                                class="w-full border rounded px-3 py-2">
                                        </div>

                                    </div>

                                </div>

                            </div>



                            {{-- RIGHT --}}
                            <div class="space-y-6">

                                {{-- BRAND --}}
                                <div class="bg-white p-6 rounded shadow border">

                                    <h3 class="font-semibold mb-4 border-b pb-2">Brand</h3>

                                    <select name="brand_id" class="w-full border rounded px-3 py-2">

                                        <option value="">Select Brand</option>

                                        @foreach($brands as $brand)

                                            <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                {{-- PRICING --}}
                                <div class="bg-white p-6 rounded shadow border">

                                    <h3 class="font-semibold mb-4 border-b pb-2">Pricing</h3>

                                    <div class="mb-3">
                                        <label class="block text-sm mb-1">Price</label>

                                        <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                                            class="w-full border rounded px-3 py-2">
                                    </div>

                                    <div>
                                        <label class="block text-sm mb-1">Discount (%)</label>

                                        <input type="number" name="discount" value="{{ old('discount') }}"
                                            class="w-full border rounded px-3 py-2">
                                    </div>

                                </div>


                                {{-- IMAGE --}}
                                <div class="bg-white p-6 rounded shadow border">

                                    <h3 class="font-semibold mb-4 border-b pb-2">Product Image</h3>

                                    @if(isset($product) && $product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" class="w-24 mb-3 rounded">
                                    @endif

                                    <input type="file" name="image">

                                </div>


                                <div class="flex justify-end">

                                    <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">

                                        {{ isset($product) ? 'Update Product' : 'Save Product' }}

                                    </button>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>


    {{-- SUBCATEGORY JS --}}
    <script>

        let categories = @json($categories);

        document.getElementById('category').addEventListener('change', function () {

            let categoryId = this.value;

            let subCategory = document.getElementById('subCategory');

            subCategory.innerHTML = '<option value="">Select Sub Category</option>';

            categories.forEach(function (cat) {

                if (cat.parent_id == categoryId) {

                    subCategory.innerHTML +=
                        `<option value="${cat.id}">${cat.name}</option>`;

                }

            });

        });

    </script>

@endsection