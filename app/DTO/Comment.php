<?php

namespace App\DTO;

use Carbon\Carbon;
use Illuminate\Support\Collection;

final readonly class Comment
{
    public bool $approved;
    public string $content;
    public ?string $id;
    public ?string $parentId;
    public string $initials;
    public Carbon $date;
    public Author $author;
    public ?Collection $comments;

    public function __construct(
        private array $data,
    ) {
        $this->approved = data_get($data, 'approved');
        $this->content = data_get($data, 'content');
        $this->id = data_get($data, 'databaseId');
        $this->initials = "JA";
        $this->date = Carbon::parse(data_get($data, 'date'));
        $this->parentId = data_get($data, 'parentDatabaseId');
        $this->author = new Author(data_get($data, 'author'));
    }

    public function subComments(Collection $comments)
    {
        $this->comments = $comments;
    }
}