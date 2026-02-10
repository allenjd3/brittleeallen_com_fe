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
    />
    <x-britt-message />
    <livewire:recent-articles />
    <div class="flex flex-col items-center gap-8 my-16">
        <h2 class="text-3xl font-serif">
            Sign up for my newsletter!
        </h2>
        <iframe src="https://brittanyleeallen.substack.com/embed" width="480" height="320" frameborder="0" scrolling="no"></iframe>

        <a class="text-xl font-serif" href="https://www.instagram.com/brittanyleeallen/">Follow along on Instagram @brittanyleeallen</a>
    </div>
</div>