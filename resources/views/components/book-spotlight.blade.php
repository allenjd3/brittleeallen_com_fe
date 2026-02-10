@props([
    'bookTitle' => '',
    'bookTagline' => '',
    'bookQuote' => '',
    'bookUrl' => '',
])
<div class="bg-tan-light relative isolate">
    <div class="wrapper px-4 py-12 grid gap-8 grid-cols-1 sm:grid-cols-2">
        <div class="flex justify-center -rotate-3 sm:order-last"><img class="max-h-96 shadow-tan-dark shadow-2xl" src="{{ $bookUrl }}" /></div>
        <div class="flex flex-col items-start justify-center">
            <span class="py-1 px-4 uppercase text-xs bg-tan-dark rounded-full">Available For Preorder</span>
            <h1 class="text-6xl mt-4 mb-2 font-serif">{{ $bookTitle }}</h1>
            <div class="text-lg">
                <p class="font-serif italic text-black/80">{{ $bookTagline }}</p>
                <div class="mt-4 [&>p]:mb-4" >{!! $bookQuote !!}</div>
            </div>
            <div class="flex gap-4">
                <flux:button href="https://www.amazon.com/Free-Weep-Finding-Courage-Embracing-ebook/dp/B0FQZN9QCL?ref_=ast_author_dp&th=1&psc=1" variant="primary">Preorder Now</flux:button>
            </div>
        </div>
    </div>
</div>