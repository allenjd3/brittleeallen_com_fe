<?php

use App\DTO\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function getCategories()
    {
        $response = Http::asJson()->post(config('app.api_endpoint'), [
            'query' => File::get(resource_path('graphql/getCategories.graphql')),
            'variables' => [
                'tag' => 'category-tag',
            ]
        ]);

        return collect($response->json('data.pages.nodes'))
            ->mapInto(Category::class);
    }
};
?>

<div class="bg-tan-light py-16">
    <h2 class="text-3xl text-center font-serif mb-8">Categories</h2>
    <div class="max-w-6xl mx-auto grid grid-cols-[repeat(auto-fill,minmax(300px,1fr))] gap-8 px-8">
        @foreach($this->getCategories as $category)
            <div class="text-center bg-white shadow-lg">
                <img src="{{ $category->featuredImage->getUrl('large') }}" alt="{{ $category->featuredImage->altText }}" />
                <h3 class="text-xl p-4 font-bold">{{ $category->title }}</h3>
            </div>
        @endforeach
    </div>
</div>