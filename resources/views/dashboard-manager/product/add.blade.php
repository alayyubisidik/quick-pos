@extends('layout.main')

@section('title', 'Add Product')

@section('content')
    <h1 class="text-2xl font-semibold mb-[1.5rem]">Add Product</h1>

    <form action="{{ route('product.submit-add-product') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
            @error("name")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input type="type" id="name" value="{{ old("name") }}" name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="Jhon Doe" />
        </div>

        <div class="mb-6">
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
            @error("category")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <select id="category_id" name="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                @foreach ($categories as $category)
                    <option value="{{ $category["id"] }}">{{ $category["name"] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
            @error("price")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input type="number" id="price" value="{{ old("price") }}" name="price"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="15000" />
        </div>

        <div class="mb-6">
            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 ">Stock</label>
            @error("stock")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input type="number" id="stock" value="{{ old("stock") }}" name="stock"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="100" />
        </div>

        <div class="mb-6">
            <label for="min_stock" class="block mb-2 text-sm font-medium text-gray-900 ">Minimal Stock</label>
            @error("min_stock")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input type="number" id="min_stock" value="{{ old("min_stock") }}" name="min_stock"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="100" />
        </div>

        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Product Image</label>
            @error("image")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input onchange="previewImage(this)" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none " aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 " id="file_input_help">SVG, PNG or JPG  (MAX. 800x400px | 5MB).</p>
            <img id="preview" src="#" alt="Preview"
            style="display: none; max-width: 150px;; margin-top: 10px;">
        </div>

        <div class="flex gap-[.5rem] mt-[1rem]">
            <button type="submit"
            class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-[1rem] focus:outline-none ">Save</button>
            <a href="/dashboard-manager/user">
                <button type="button"
                class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-[1rem] focus:outline-none ">Back</button>
            </a>
        </div>

    </form>

    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>

@endsection
