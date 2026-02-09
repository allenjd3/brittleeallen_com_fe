<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <x-book-spotlight
        bookTitle="Lost Gifts"
        bookTagline="This is a tagline"
        bookUrl="https://brittleeallen.com/app/uploads/2023/02/IMG_3999.jpg"
        bookQuote="<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio quis autem atque, nostrum optio fugit repellat voluptatem possimus quidem</p> <p>veritatis magnam nesciunt corrupti alias accusamus, aliquid maiores consequuntur reiciendis cupiditate.</p>"
    />
    <x-britt-message />
    <div class="bg-green-very-dark p-8">
        <h2 class="text-4xl text-white/90 font-serif text-center mb-2">Excerpts</h2>
        <p class="text-xl font-serif text-white/90 text-center mb-8 italic">Some Tagline Here</p>
        <div class="wrapper place-items-center grid grid-cols-1 md:grid-cols-2 p-8 gap-8">
            <div class="row-start-2 md:col-start-1 md:row-start-1 bg-green-base relative p-8 rounded-lg">
                <div class="absolute top-0 left-0 p-2 text-green-very-dark/50">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H16.017C14.9124 8 14.017 7.10457 14.017 6V3H19.017C20.6739 3 22.017 4.34315 22.017 6V15C22.017 18.3137 19.3307 21 16.017 21H14.017ZM2.01697 21L2.01697 18C2.01697 16.8954 2.9124 16 4.01697 16H7.01697C7.56925 16 8.01697 15.5523 8.01697 15V9C8.01697 8.44772 7.56925 8 7.01697 8H4.01697C2.9124 8 2.01697 7.10457 2.01697 6V3H7.01697C8.67383 3 10.017 4.34315 10.017 6V15C10.017 18.3137 7.33068 21 4.01697 21H2.01697Z" />
                    </svg>
                </div>
                <blockquote class="text-white font-serif italic text-xl isolate z-10 leading-8 relative">
                    "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus, est incidunt quam repellendus quibusdam, libero laborum amet veritatis eveniet architecto tempora! Assumenda, soluta obcaecati aut veniam perferendis illum! Inventore, itaque?"
                </blockquote>
            </div>
            <div class="row-start-1 md:col-start-2"><img class="max-h-[30rem] shadow-2xl" src="https://brittleeallen.com/app/uploads/2023/02/IMG_3999.jpg" /></div>
        </div>
        <div class="wrapper place-items-center grid grid-cols-1 md:grid-cols-2 p-8 gap-8">
            <div class="row-start-2 md:col-start-2 md:row-start-1 bg-green-base relative p-8 rounded-lg">
                <div class="absolute top-0 left-0 p-2 text-green-very-dark/50">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H16.017C14.9124 8 14.017 7.10457 14.017 6V3H19.017C20.6739 3 22.017 4.34315 22.017 6V15C22.017 18.3137 19.3307 21 16.017 21H14.017ZM2.01697 21L2.01697 18C2.01697 16.8954 2.9124 16 4.01697 16H7.01697C7.56925 16 8.01697 15.5523 8.01697 15V9C8.01697 8.44772 7.56925 8 7.01697 8H4.01697C2.9124 8 2.01697 7.10457 2.01697 6V3H7.01697C8.67383 3 10.017 4.34315 10.017 6V15C10.017 18.3137 7.33068 21 4.01697 21H2.01697Z" />
                    </svg>
                </div>
                <blockquote class="text-white font-serif italic text-xl isolate z-10 leading-8 relative">
                    "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus, est incidunt quam repellendus quibusdam, libero laborum amet veritatis eveniet architecto tempora! Assumenda, soluta obcaecati aut veniam perferendis illum! Inventore, itaque?"
                </blockquote>
            </div>
            <div class="row-start-1 md:col-start-1"><img class="max-h-[30rem] shadow-2xl" src="https://brittleeallen.com/app/uploads/2023/02/IMG_3999.jpg" /></div>
        </div>
    </div>
</div>