<x-layout>

    <a href="{{ route('dashboard')}}" class="block mb-2 text-xs
    text-blue-500">&larr; Go back to your dashboard</a>

    <div class="card">
        <h2 class="font-bold mb-4">Update your post</h2>
        <form action="{{ route('posts.update', $post)}}" 
        method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Post title --}}
            <div>
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                {{ $errors->has('title') ? 'border-red-500 ring-red-500' : 'border-gray-300' }}">
                @error('title')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body">Post Content</label>
                
                <textarea name="body" rows="5" class="input" 
                @error('body') ring-red-500    
                @enderror>{{ $post->body }}</textarea>
                
                @error('body')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
    {{--Current cover Photo if exists--}}
    @if ($post->image)
    <div class="rounded-md mb-4 w-1/4 object-cover overflow-hidden">
        <label>Current cover photo</label>
        <img src="{{ asset('storage/' . $post->image)}}" alt="">
    </div>
    @endif
    <div class="mb-4">
                <label for="image" class="block mb-1 font-medium
                 text-gray-700">Cover Photo</label>
                <label  for="image" class="cursor-pointer inline-block 
                bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition">
                Choose File </label>
                <input type="file" name="image" id="image" class="hidden">
                @error('image')
                    <p class="error text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{--Submit Button--}}
            <button class="btn" >Update</button>
        </form>
    </div>
        
</x-layout>