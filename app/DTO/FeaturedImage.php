<?php

namespace App\DTO;
use Illuminate\Support\Collection;

final readonly class FeaturedImage
{
    public string $altText;
    public Collection $sizes;

    public function __construct(
        private array $data,
    ) {
        $this->altText = data_get($data, 'node.altText');
        $this->sizes = collect(data_get($data, 'node.mediaDetails.sizes'));
    }

    public function getUrl(string $mysize)
    {
        return $this->sizes
            ->filter(fn ($size) => data_get($size, 'name') == $mysize)
            ->pluck('sourceUrl')
            ->first();
    }
}