<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="max-w-5xl mb-32 mx-auto px-4">
    <img class="w-full max-w-3xl mx-auto" src="{{ asset('/images/britt_speaking.webp') }}" alt="Brittany Allen" />
    <h1 class="text-4xl my-8 font-serif text-center capitalize">Looking for a speaker for your next Women’s event?</h1>
    <div class="prose max-w-full prose-lg text-pretty">
        <p>Brittany is available for weekend retreats or conferences. If you’re looking to book her for your next women’s event, please fill out this form.</p>
        <p>Choose from the following topics or inquire about your own:</p>
        <ul>
            <li>3 sessions on Discovering a Theology of Suffering</li>
            <li>2 sessions on Knowing Christ in His Sufferings</li>
            <li>2 sessions on Grief and the God of All Comfort</li>
            <li>3 sessions on the book of Philippians</li>
            <li>Brittany is also open to speaking at Miscarriage/infertility support groups</li>
        </ul>

        <p>Please <a href="{{ route('contacts') }}">fill out this form</a> if interested in booking Brittany for your event and she or someone from her team will get back to you.</p>
    </div>
</div>