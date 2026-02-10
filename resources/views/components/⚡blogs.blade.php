<?php

use App\DTO\Post;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

new class extends Component
{
    public ?string $search = null;
    public ?string $cursor = null;

    #[Url]
    public ?string $categoryName = null;
    public array $postsData = [];

    public function mount() {
        $this->loadMore();
    }

    public function loadMore() {
        $data = Cache::flexible(
            "loadMore{$this->search}{$this->cursor}{$this->categoryName}",
            [5, 10],
            fn () => Http::asJson()->retry(3, 500)->post(config('app.api_endpoint'), [
                'query' => File::get(resource_path('graphql/getPosts.graphql')),
                'variables' => [
                    'first' => 5,
                    'search' => $this->search,
                    'after' => $this->cursor,
                    'categoryName' => $this->categoryName,
                ]
            ])->json('data.posts')
        );

        $this->postsData = array_merge(
            $this->postsData,
            $data['nodes'] ?? []
        );

        $this->cursor = $data['pageInfo']['endCursor'] ?? null;
    }

    #[Computed]
    public function posts() {
        // Map to DTOs only when accessed
        return collect($this->postsData)->mapInto(Post::class);
    }

    public function updatedSearch() {
        $this->postsData = [];
        $this->cursor = null;
        $this->loadMore();
    }
};
?>

<div>
<livewire:categories />
<div id="blogs" class="space-y-8 max-w-5xl mx-auto my-8 scroll-mt-16">
    <flux:input icon="magnifying-glass" placeholder="Search orders" wire:model.live="search" />
    @foreach ($this->posts as $post)
        <div class="grid grid-cols-1 sm:grid-cols-[300px_1fr] gap-8 px-4 place-items-center">
            <div class="aspect-video overflow-hidden">
                <img class="object-cover object-center w-full h-full" src="{{ $post->featuredImage->getUrl('large') }}" alt="{{ $post->featuredImage->altText }}" />
            </div>
            <div>
                <h3 class="text-2xl mb-3"><a href="{{ route('post.uri', ['uri' => $post->uri]) }}" wire:navigate.hover>{{ $post->title }}</a></h3>
                {!! $post->body !!}
            </div>
        </div>
    @endforeach
    <div x-intersect.margin.200px="$wire.loadMore()" class="flex justify-center items-center">
        <flux:button wire:click="loadMore" variant="primary">Load More</flux:button>
    </div>
</div>
</div>