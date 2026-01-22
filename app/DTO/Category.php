<?php

namespace App\DTO;

final readonly class Category
{
    public string $title;
    public FeaturedImage $featuredImage;

    public function __construct(
        private array $data
    ) {
        $this->title = data_get($data, 'title');
        $this->featuredImage = new FeaturedImage(data_get($data, 'featuredImage'));
    }
}