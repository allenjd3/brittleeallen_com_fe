<?php

namespace App\DTO;

final readonly class Category
{
    public string $title;
    public string $id;
    public string $slug;
    public FeaturedImage $featuredImage;

    public function __construct(
        private array $data
    ) {
        $this->title = data_get($data, 'title');
        $this->id = data_get($data, 'databaseId');
        $this->slug = data_get($data, 'slug');
        $this->featuredImage = new FeaturedImage(data_get($data, 'featuredImage'));
    }
}