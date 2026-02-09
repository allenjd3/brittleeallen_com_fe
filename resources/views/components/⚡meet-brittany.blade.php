<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <div class="max-w-5xl mb-32  mx-auto px-4 prose-lg">
        <img class="w-full max-w-sm mx-auto" src="{{ asset('/images/britt.webp') }}" alt="Brittany Allen" />
        <p>Hi there! My name is Brittany Allen. I’m a wife to James and mama to two boys, as well as three babies in heaven lost through miscarriage. I’m an author, aspiring poet, and a sometimes speaker.</p>

        <p>If you were to peer into my home, you might find me changing another diaper or grabbing another snack, sipping my second cup of coffee, tending to my small cut flower garden (in the summer), writing in the in-between moments of motherhood, or held up on the couch with a heating pad.</p>

        <p>I write a lot about suffering, chronic illness, miscarriage, motherhood, theology, and whatever else the Lord lays on my heart. I’m on a journey to treasuring Christ above all. My hope is that he would use my writing to lead others to fix their eyes on him.</p>

        <p>My book, Lost Gifts: Miscarriage, Grief, and the God of All Comfort releases July 23rd 2025 with Lexham Press. My second book, tentatively titled Free to Weep, is set to release April 2026.</p>

        <p>I love to share the truth of God through story and capture the griefs and joys we carry in poetry. I write mostly on my Substack, Treasuring Christ, where I send out a monthly newsletter linking to book, music, podcast, and article recommendations. I also share my current reading list as well as recipes, clothing, and other random things I’m loving lately. I would love to chat with you over there.</p>

        <p>I’m often broken and needy. There will be no facades here. I work to be vulnerable for the sake of others, that they may be drawn to Christ, their Good Shepherd.</p>
        <hr />
        <p>If you’re looking for a speaker for your upcoming women’s event, click <a href="/contact" class="font-bold">here</a> to contact me.</p>
    </div>
    <div style="--swiper-theme-color: var(--color-gray-900);" class="max-w-5xl mb-32  mx-auto px-4">
        <h2 class="text-2xl font-bold">Find Me On</h2>
        <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="https://www.callapresspublishing.com/search?q=brittany%20allen"><img src="{{ asset('images/find-me/cala-press-1.jpg') }}" alt="Calla Press Publishing" /></a>
            </div>
            <div class="swiper-slide">
                <a href="https://gcdiscipleship.com/article-feed?author=5c589ac207fc7b19a039b853"><img src="{{ asset('images/find-me/gcd-1.jpg') }}" alt="GCD" /></a>
            </div>
            <div class="swiper-slide">
                <a href="https://hosannarevival.com/search?type=product%2Carticle%2Cpage&q=brittany+allen"><img src="{{ asset('images/find-me/hosanna-revival-1.jpg') }}" alt="GCD" /></a>
            </div>
            <div class="swiper-slide">
                <a href="https://www.journeywomen.org/search?q=brittany%20allen"><img src="{{ asset('images/find-me/journey-women-1.jpg') }}" alt="GCD" /></a>
            </div>
            <div class="swiper-slide">
                <a href="https://www.reviveourhearts.com/contributors/brittany-allen/"><img src="{{ asset('images/find-me/revive-our-hearts-5.jpg') }}" alt="GCD" /></a>
            </div>
            <div class="swiper-slide">
                <a href="https://www.thegospelcoalition.org/profile/brittany-allen/"><img src="{{ asset('images/find-me/tgc-1.jpg') }}" alt="GCD" /></a>
            </div>
            <div class="swiper-slide">
                <a href="https://wellwateredwomen.com/?s=brittany"><img src="{{ asset('images/find-me/well-watered-women-1.jpg') }}" alt="GCD" /></a>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        </div>
    </div>

    @vite(['resources/js/swiper.js'])
</div>