<?php

namespace App\DTO;
use Carbon\Carbon;

final readonly class Post
{
    public string $title;
    public string $body;
    public string $uri;
    public FeaturedImage $featuredImage;
    public Carbon $date;

    public function __construct(
        private array $data
    ) {
        $this->title = data_get($data, 'title');
        if (data_has($data, 'excerpt')) {
            $this->body = data_get($data, 'excerpt');
        }

        if (data_has($data, 'content')) {
            $this->body = data_get($data, 'content');
        }

        $this->uri = data_get($data, 'uri');
        $this->featuredImage = new FeaturedImage(data_get($data, 'featuredImage'));
        $this->date = Carbon::parse(data_get($data, 'date'));
    }
}