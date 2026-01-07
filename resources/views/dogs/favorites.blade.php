@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-pink-400 to-red-400 bg-clip-text text-transparent flex items-center gap-3">
                <span class="text-4xl">❤️</span>
                My Favorite Dogs
            </h2>
            <p class="text-gray-400 mt-2">Your curated collection of adorable pups</p>
        </div>
        <a 
            href="/" 
            class="px-6 py-3 bg-gray-800 hover:bg-gray-700 text-white rounded-xl transition-all flex items-center gap-2 border border-gray-700 hover:border-indigo-500">
            <span>←</span>
            <span>Back to Home</span>
        </a>
    </div>

    @if($favorites->isEmpty())
        <!-- Empty State -->
        <div class="bg-gray-900 border-2 border-dashed border-gray-700 rounded-3xl p-12 text-center">
            <div class="text-6xl mb-4">🐕</div>
            <h3 class="text-2xl font-bold mb-3 text-gray-300">No favorites yet!</h3>
            <p class="text-gray-400 mb-6">Start exploring and save your favorite dog images</p>
            <a 
                href="/" 
                class="inline-block px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-semibold rounded-xl transition-all transform hover:scale-105">
                Find Dogs Now
            </a>
        </div>
    @else
        <!-- Masonry Grid -->
        <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-6 space-y-6">
            @foreach($favorites as $dog)
                <div class="break-inside-avoid group">
                    <div class="bg-gray-900 rounded-2xl overflow-hidden shadow-xl border border-gray-800 hover:border-indigo-500 transition-all transform hover:scale-[1.02]">
                        <!-- Image -->
                        <div class="relative overflow-hidden bg-gray-800">
                            <img 
                                src="{{ $dog->image_url }}" 
                                alt="{{ ucfirst($dog->breed) }}"
                                class="w-full h-auto object-cover transition-transform duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        
                        <!-- Info Bar -->
                        <div class="p-4 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span class="text-2xl">🐕</span>
                                <span class="font-semibold text-indigo-300">{{ ucfirst($dog->breed) }}</span>
                            </div>
                            <form method="POST" action="/favorite/{{ $dog->id }}" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit"
                                    class="px-3 py-2 bg-red-600/20 hover:bg-red-600 text-red-400 hover:text-white rounded-lg transition-all flex items-center gap-1 text-sm font-medium border border-red-600/30 hover:border-red-600"
                                    onclick="return confirm('Remove this dog from favorites?')">
                                    <span>🗑️</span>
                                    <span class="hidden sm:inline">Remove</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection