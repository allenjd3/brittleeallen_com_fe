<?php

use Illuminate\Support\Facades\Http;

test('home page returns 200', function () {
    $this->get('/')->assertOk();
});

test('blogs page returns 200', function () {
    Http::fake([
        config('app.api_endpoint') => Http::response([
            'data' => [
                'posts' => [
                    'nodes' => [],
                    'pageInfo' => ['hasNextPage' => false, 'endCursor' => null],
                ],
            ],
        ]),
    ]);

    $this->get('/blogs')->assertOk();
});

test('contact page returns 200', function () {
    $this->get('/contact')->assertOk();
});

test('why-i-write page returns 200', function () {
    $this->get('/why-i-write')->assertOk();
});

test('speaker page returns 200', function () {
    $this->get('/speaker')->assertOk();
});

test('blog post page returns 200 for valid uri', function () {
    Http::fake([
        config('app.api_endpoint') => Http::response([
            'data' => [
                'nodeByUri' => [
                    'title' => 'Test Post',
                    'slug' => 'test-post',
                    'databaseId' => 1,
                    'uri' => '/test-post',
                    'content' => '<p>Test content</p>',
                    'date' => '2024-01-01T00:00:00',
                    'featuredImage' => [
                        'node' => [
                            'altText' => '',
                            'sourceUrl' => '',
                            'mediaDetails' => ['sizes' => []],
                        ],
                    ],
                    'author' => ['node' => ['name' => 'Brittany']],
                    'categories' => ['nodes' => []],
                    'comments' => ['nodes' => []],
                ],
            ],
        ]),
    ]);

    $this->get('/test-post')->assertOk();
});

test('blog post page returns 404 for unknown uri', function () {
    Http::fake([
        config('app.api_endpoint') => Http::response([
            'data' => ['nodeByUri' => null],
        ]),
    ]);

    $this->get('/this-post-does-not-exist')->assertNotFound();
});
