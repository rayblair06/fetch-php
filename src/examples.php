<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * Simple GET Requets
 */
$response = fetch('https://jsonplaceholder.typicode.com/posts/1');

var_dump($response);

/**
 * POST Request
 */
$response = fetch('https://jsonplaceholder.typicode.com/posts', [
    'method' => 'post',
    'headers' => [
        'Content-type: application/json; charset=UTF-8',
    ],
    'body' => [
        'userId' => 1,
        'title' => 'Test Post Title',
        'body' => 'This is my test post'
    ]
]);

var_dump($response);
