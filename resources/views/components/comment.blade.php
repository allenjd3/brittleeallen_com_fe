@props([
    'comment',
    'isNested' => false,
])

@php
    if ($comment?->author?->email) {
        $avatarMd5 = md5(strtolower(trim($comment?->author?->email)));
        $avatarUrl = "https://www.gravatar.com/avatar/{$avatarMd5}?s=48&d=mp";
    } else {
        $avatarUrl = null;
    }
@endphp

<div
    @class([
        'bg-white border-gray-200 rounded-lg p-6 mb-4',
        'border' => ! $isNested,
        'border-l-2' => $isNested,
    ])
>
  <div class="flex items-start gap-4">
    <!-- Avatar -->
    @if ($avatarUrl)
        <img
            src="{{ $avatarUrl }}"
            alt="User avatar"
            class="w-12 h-12 rounded-full"
        />
    @else
        <div class="bg-green-light text-green-very-dark w-12 h-12 rounded-full flex justify-center items-center">
            {{ $comment->author?->initials() }}
        </div>
    @endif

    <!-- Comment content -->
    <div class="flex-1">
      <div class="flex items-center gap-2 mb-2">
        <h4 class="font-semibold text-gray-900">{{ $comment->author?->name }}</h4>
        <span class="text-sm text-gray-500">{{ $comment->date->diffForHumans() }}</span>
      </div>

      <div class="prose text-gray-700 mb-3">
        {!! $comment->content !!}
      </div>

      @if (! $isNested)
        <button class="text-sm text-green-base hover:text-green-very-dark font-medium">
            Reply
        </button>
      @endif

        @isset ($comment->comments)
            <div class="mt-8">
                @foreach($comment->comments as $subComment)
                    <x-comment :comment="$subComment" isNested />
                @endforeach
            </div>
        @endif
    </div>
  </div>
</div>