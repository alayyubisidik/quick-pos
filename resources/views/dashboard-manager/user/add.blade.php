@extends('layout.main')

@section('title', 'Add User')

@section('content')
    <h1 class="text-2xl font-semibold mb-[1.5rem]">Add User</h1>

    <form action="{{ route('user.submit-add-user') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 ">Full Name</label>
            @error("full_name")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input type="type" id="full_name" value="{{ old("full_name") }}" name="full_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="Jhon Doe" />
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email address</label>
            @error("email")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input type="email" id="email" value="{{ old("email") }}" name="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="john.doe@company.com" />
        </div>

        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
            @if( session("password-not-same-error") )
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ session("password-not-same-error") }}</p>
            @endif
            @error("password")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input type="password" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="•••••••••" />
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm password</label>
            @error("password_confirmation")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="•••••••••" />
        </div>

        <div class="mb-6">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Role</label>
            @error("role")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <select id="role" value="{{ old("role") }}" name="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <option value="cashier">Cashier</option>
                <option value="warehouse">Warehouse</option>
                <option value="manager">Manager</option>
            </select>
        </div>

        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Photo Porfile</label>
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
