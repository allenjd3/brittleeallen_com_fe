<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>
        <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
        <meta property="og:description" content="{{ $description ?? "Brittany Lee Allen - Christian author, writer & podcaster sharing hope in grief, miscarriage & suffering. Books: Free to Weep & Lost Gifts." }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ $url ?? "https://brittleeallen.com" }}" />
        <meta property="og:image" content="{{ $image ?? asset('images/britt-og.png') }}" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
        @fluxAppearance
        @stack('scripts')
    </head>
    <body>
        <x-nav-bar />
        {{ $slot }}

        <div
            x-init="
                const key = 'commentModalLastShown'
                const last = localStorage.getItem(key)
                const now = Date.now()
                const oneDay = 1000 * 60 * 60 * 24

                if (!last || now - last > oneDay) {
                    setTimeout(() => {
                        $flux.modal('ad').show()
                        localStorage.setItem(key, now)
                    }, 3000)
                }
            "
        >
            <flux:modal name="ad" class="!bg-[#E3DDDB] max-w-full">
                <iframe class="max-w-full" src="https://brittanyleeallen.substack.com/embed" width="480" height="320" frameborder="0" scrolling="no"></iframe>
            </flux:modal>
            <x-footer />
        </div>
        @livewireScripts
        @fluxScripts
    </body>
</html>
