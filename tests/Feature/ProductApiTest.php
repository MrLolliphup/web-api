<?php

test('creating a product without a body returns validation errors', function () {
    $response = $this->postJson('/api/products', []);

    $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'message',
            'errors' => ['name', 'description', 'price', 'status'],
        ]);
});

test('creating a product with invalid data returns validation errors', function () {
    $response = $this->postJson('/api/products', [
        'name' => 'Test product',
        'description' => 'Test description',
        'price' => 'not-a-price',
        'status' => 'unknown',
    ]);

    $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'message',
            'errors' => ['price', 'status'],
        ]);
});