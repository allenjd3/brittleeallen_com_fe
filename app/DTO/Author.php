<?php

namespace App\DTO;

final readonly class Author
{
    public ?string $name;
    public ?string $email;

    public function __construct(
        private array $data,
    ) {
        $this->name = data_get($data, 'name', '');
        $this->email = data_get($data, 'email', '');
    }

    public function initials()
    {
        return collect(explode(" ", $this->name))
            ->slice(0, 2)
            ->reduce(
                fn ($carry, $item) => strtoupper($carry . substr($item, 0, 1)),
                ""
            );
    }
}