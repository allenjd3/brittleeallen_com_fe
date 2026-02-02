<?php

use App\DTO\Category;
use Illuminate\Support\Arr;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function getCategories()
    {
        return config('categories.all');
    }
};
?>

<div class="bg-tan-light py-16">
    <h2 class="text-3xl text-center font-serif mb-8">Categories</h2>
    <div class="max-w-6xl mx-auto grid grid-cols-[repeat(auto-fill,minmax(300px,1fr))] gap-8 px-8">
        @foreach($this->getCategories as $category)
            <div class="text-center bg-white shadow-lg">
                <div class="aspect-square overflow-hidden">
                    <img class="w-full h-full object-cover" src="{{ config('app.base_api_endpoint') . data_get($category, 'imgSrc')}}" alt="" />
                </div>
                <h3 class="text-xl p-4 font-bold"><a href="{{ Uri::route('post.index', ['categoryName' => data_get($category, 'categorySlug')])->withFragment('blogs') }}">{{ data_get($category, 'title') }}</a></h3>
            </div>
        @endforeach
    </div>
</div>