<x-layout>
    <h1 class="font-bold">Welcome to Register Page.</h1>
 
    <div class="mx-auto max-w-screen-sm card flex items-center justify-center bg-white p-8 rounded-lg shadow-lg">
        <form action="{{ route('register') }}" method="POST" class="space-y-4 w-full max-w-md">
            @csrf
            <!-- Username Input -->
            <div>
                <label for="username" class="block text-gray-700 mb-1">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                {{ $errors->has('username') ? 'border-red-500 ring-red-500' : 'border-gray-300' }}">
                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
 
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    {{ $errors->has('email') ? 'border-red-500 ring-red-500' : 'border-gray-300' }}">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
 
            <!-- Password Input -->
            <div>
                <label for="password" class="block text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                    {{ $errors->has('password') ? 'border-red-500 ring-red-500' : 'border-gray-300' }}">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-gray-700 mb-1">Confirm Password</label>
                <input type="password" id="password" name="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                   {{ $errors->has('password') ? 'border-red-500 ring-red-500' : 'border-gray-300' }}">
 
            </div>
 
            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-slate-700 text-white py-2 px-4 rounded-md hover:bg-slate-600 transition-colors font-semibold">
                Register
            </button>
        </form>
    </div>
</x-layout>