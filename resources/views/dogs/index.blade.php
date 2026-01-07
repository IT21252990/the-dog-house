@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Main Card -->
    <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 rounded-3xl shadow-2xl overflow-hidden border border-gray-700">
        <!-- Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-2 text-center">
            <h2 class="text-xl md:text-2xl font-bold mb-2 flex items-center justify-center gap-3">
                <span class="text-3xl">🐾</span>
                Find Your Next Favorite Dog
                <span class="text-3xl">🐾</span>
            </h2>
            <p class="text-indigo-100 text-sm md:text-base">Select a breed or get a random surprise!</p>
        </div>

        <!-- Search Form -->
        <div class="p-6 md:p-8">
            <form method="GET" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 max-w-2xl mx-auto mb-8">
                <div class="flex-1">
                    <label for="breed-select" class="block text-sm font-medium text-gray-400 mb-2">Choose a breed</label>
                    <select 
                        id="breed-select"
                        name="breed" 
                        class="bg-gray-800 border-2 border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 p-4 rounded-xl w-full text-gray-100 transition-all outline-none">
                        <option value="">🎲 Random Breed (Surprise Me!)</option>
                        @foreach($breeds as $breed => $sub)
                            <option value="{{ $breed }}" @selected($breed == $selectedBreed)>
                                {{ ucfirst($breed) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button
                    type="submit"
                    onclick="showDogLoader()"
                    class="px-8 py-4 cursor-pointer bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-semibold rounded-xl transition-all transform hover:scale-105 shadow-lg hover:shadow-xl sm:mt-7">
                    🔍 Find Dog
                </button>
            </form>

            <!-- Loading State -->
            <div id="dog-loader" class="hidden mt-8 flex flex-col items-center gap-4 py-12">
                <div class="animate-spin rounded-full h-16 w-16 border-4 border-indigo-500 border-t-transparent"></div>
                <p class="text-gray-300 text-lg font-medium animate-pulse">Finding the perfect pup...</p>
            </div>

            <!-- Dog Display -->
            <div id="dog-result" class="mt-8">
                <!-- Image Container -->
                <div class="bg-gray-800/50 rounded-2xl p-4 md:p-6 mb-6">
                    <div class="flex justify-center">
                        <img 
                            src="{{ $image }}" 
                            alt="Dog image"
                            class="w-full max-w-2xl h-auto max-h-[500px] object-contain rounded-xl shadow-2xl border-4 border-gray-700">
                    </div>
                </div>

                <!-- Action Section -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-6">
                    <div class="bg-gray-800 px-6 py-3 rounded-xl border border-gray-700">
                        <span class="text-gray-400 text-sm">Current Breed: </span>
                        <span class="text-indigo-400 font-bold text-lg">{{ $selectedBreed ? ucfirst($selectedBreed) : 'Random' }}</span>
                    </div>
                    
                    <form method="POST" action="/favorite">
                        @csrf
                        <input type="hidden" name="breed" value="{{ $selectedBreed ?? 'random' }}">
                        <input type="hidden" name="image_url" value="{{ $image }}">
                        <button 
                            type="submit"
                            class="px-8 cursor-pointer py-4 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-500 hover:to-emerald-500 text-white font-semibold rounded-xl transition-all transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-2">
                            <span class="text-xl">❤️</span>
                            Save to Favorites
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showDogLoader() {
        document.getElementById('dog-loader').classList.remove('hidden');
        document.getElementById('dog-result').classList.add('hidden');
    }
</script>
@endsection