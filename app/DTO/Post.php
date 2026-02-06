<?php

namespace App\DTO;
use Carbon\Carbon;
use Illuminate\Support\Collection;

final readonly class Post
{
    public ?int $id;
    public string $title;
    public string $body;
    public string $uri;
    public FeaturedImage $featuredImage;
    public Carbon $date;
    public Collection $comments;

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

        $this->id = data_get($data, 'databaseId');
        $this->uri = data_get($data, 'uri');
        $this->featuredImage = new FeaturedImage(data_get($data, 'featuredImage'));
        $this->date = Carbon::parse(data_get($data, 'date'));
        $this->nestComments(collect(data_get($data, 'comments.nodes'))->mapInto(Comment::class));
    }

    private function nestComments($flatComments)
    {
        $baseComments = $flatComments->filter(fn ($comment) => $comment->parentId == 0);
        $baseComments->map(fn ($comment) => $comment->subComments($flatComments->filter(fn ($subComment) => $subComment->parentId == $comment->id)));
        $this->comments = $baseComments;
    }
}