<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <x-book-spotlight
        bookTitle="Free to Weep"
        bookTagline="Finding the Courage to Grieve and Embracing the God Who Heals"
        bookUrl="{{ asset('images/free-to-weep.jpg') }}"
        bookQuote="<p>What does it look like to suffer well—to grieve life’s losses, big and small? How does God grieve? Looking to the example of Jesus, our Suffering Savior, readers grow in empathy, truth, and grace for themselves and others. God is with you in your pain. When you’re suffering, He invites you to draw near and rest in Him. Join Brittany in discovering the beauty of God’s heart in Free to Weep.</p>"
        url="https://www.amazon.com/Free-Weep-Finding-Courage-Embracing-ebook/dp/B0FQZN9QCL?ref_=ast_author_dp&th=1&psc=1"
    />
    <x-britt-message />
    <livewire:recent-articles lazy />

    <div class="bg-tan-light relative isolate">
        <div class="wrapper px-4 py-12">
            <div class="text-center">
                <div class="grid grid-cols-2 gap-4 place-items-center w-max max-w-full mx-auto">
                    <div class="flex flex-col gap-4">
                        <div>
                            <span class="py-1 px-4 uppercase text-xs bg-tan-dark rounded-full">Now Available</span>
                            <h1 class="text-6xl mt-4 mb-2 font-serif">Lost Gifts</h1>
                            <p>Miscarriage, Grief, and the God of All Comfort</p>
                        </div>
                        <div class="items-center gap-4">
                            <flux:button href="" variant="primary">Buy Now</flux:button>
                        </div>
                    </div>
                    <div class="flex justify-center"><img class="max-h-96" src="{{ asset('images/lost-gifts.jpg') }}" /></div>
                </div>
                <div class="prose-lg relative isolate text-lg bg-tan-dark max-w-4xl mx-auto mt-8 p-8 rounded-xl">
                    <div class="absolute top-4 left-4 text-7xl opacity-10">&#10077;</div>
                    <p class="z-10">"Walking through miscarriage is like a season of storms and steady rain. The storms are like tsunamis, threatening to overtake and drown your life in sorrow. Once the storm is hushed, you're left with unrelenting rain—the steady undertone of sadness as you learn to live without the baby (or ba-bies) you had hoped would be part of your life. What would they have looked like, we wonder? Who would they have be-come? How would it feel to hold their tiny hand, even just for a moment?"</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center gap-8 my-16">
        <h2 class="text-3xl font-serif">
            Sign up for my newsletter!
        </h2>
        <iframe src="https://brittanyleeallen.substack.com/embed" width="480" height="320" frameborder="0" scrolling="no"></iframe>

        <a class="text-xl font-serif" href="https://www.instagram.com/brittanyleeallen/">Follow along on Instagram @brittanyleeallen</a>
    </div>
</div>