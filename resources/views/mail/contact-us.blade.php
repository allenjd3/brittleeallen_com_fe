<x-mail::message>
# You got a new message from {{ $name }}

{!! e(nl2br($content)) !!}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
