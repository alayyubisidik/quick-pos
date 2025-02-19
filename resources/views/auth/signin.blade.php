<h1>Login</h1>

@if (session("message-error"))
    <p class="text-red-500 text-xl">{{ session("message-error") }}</p>
    @endif
    
<form action="/signin" method="post">
    @csrf
        
    <label for="">email</label>
    @error("email")
        <p class="text-red-500">{{ $message }}</p>
    @enderror
    <input type="text" name="email" value="{{ old("email") }}">
    
    <label for="">password</label>
    @error("password")
        <p class="text-red-500">{{ $message }}</p>
    @enderror
    <input type="password" name="password" >

    <button type="submit">Sign in</button>
</form>