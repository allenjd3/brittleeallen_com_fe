<div class="px-8 py-16 bg-green-very-dark">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-serif text-center mb-16"><span class="px-8 py-4 bg-gray-800 text-white">Recent Articles</span></h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 lg:grid-cols-4">
            @foreach(range(1, 4) as $i)
                <div class="bg-white isolate relative group">
                    <div class="aspect-square bg-gray-800 bg-gray-100"></div>
                    <div class="p-4">
                        <h3 class="text-lg sm:text-xl sm:text-center mb-4 line-clamp-1"></h3>
                        <p class="p-2 line-clamp-2"></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>