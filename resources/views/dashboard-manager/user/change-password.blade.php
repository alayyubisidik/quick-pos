@extends('layout.main')

@section('title', 'Change Password User')

@section('content')
    <h1 class="text-2xl font-semibold mb-[1.5rem]">Change Password User</h1>

    <p class="text-xl font-semibold mt-[2rem] mb-[.5rem]">User Info</p>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-[2rem]">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-white uppercase bg-blue-500  ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Full Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b ">
                    <td class="px-6 py-4 text-gray-800 font-semibold ">
                        1
                    </td>
                    <td class="px-6 py-4 text-gray-700 ">
                        <img src="{{ asset('/storage/profile-image/' . $user["image"]) }}" class="w-[100px] ">
                    </td>
                    <td class="px-6 py-4 text-gray-700 ">
                        {{ $user['full_name'] }}
                    </td>
                    <td class="px-6 py-4 text-gray-700 ">
                        {{ $user['email'] }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <form action="/dashboard-manager/user/change-password/{{ $user_id }}" method="post">
        @csrf

        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">New Password</label>
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
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm new password</label>
            @error("password_confirmation")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="•••••••••" />
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

    {{-- <form action="/dashboard-manager/user/edit/{{ $user["id"] }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 ">Full Name</label>
            @error("full_name")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input type="type" id="full_name" value="{{ $user["full_name"] }}" name="full_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="Jhon Doe" />
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email address</label>
            @error("email")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input type="email" id="email" value="{{ $user["email"] }}" name="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="john.doe@company.com" />
        </div>

        <div class="mb-6">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Role</label>
            @error("role")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <select id="role" name="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                
                <option value="cashier" {{  $user["role"] == 'cashier' ? 'selected' : '' }}>Cashier</option>
                <option value="warehouse" {{  $user["role"] == 'warehouse' ? 'selected' : '' }}>Warehouse</option>
                <option value="manager" {{  $user["role"] == 'manager' ? 'selected' : '' }}>Manager</option>
            </select>
        </div>        

        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Upload file</label>
            @error("image")
                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
            @enderror
            <input onchange="previewImage(this)" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none " aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 " id="file_input_help">SVG, PNG or JPG  (MAX. 800x400px | 5MB).</p>
            <img id="preview" src="{{  asset('/storage/profile-image/' . $user["image"]) }}" alt="Preview" style=" max-width: 150px; margin-top: 10px;">
        </div>

        <div class="flex gap-[.5rem] mt-[1rem]">
            <button type="submit"
            class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-[1rem] focus:outline-none ">Save</button>
            <a href="/dashboard-manager/user">
                <button type="button"
                class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-[1rem] focus:outline-none ">Back</button>
            </a>
        </div>

    </form> --}}

@endsection
