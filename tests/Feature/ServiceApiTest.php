<?php

use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

uses(RefreshDatabase::class);

test('an authenticated user can create a service for a service type', function () {
    $user = User::factory()->create();
    $serviceType = ServiceType::factory()->create();

    $response = $this
        ->withToken(JWTAuth::fromUser($user))
        ->postJson('/api/services', [
            'service_type_id' => $serviceType->id,
            'name' => 'Website hosting',
            'price' => 49.99,
            'description' => 'Managed hosting',
            'status' => true,
        ]);

    $response
        ->assertCreated()
        ->assertJsonPath('user_id', $user->id)
        ->assertJsonPath('service_type_id', $serviceType->id);

    $this->assertDatabaseHas('services', [
        'user_id' => $user->id,
        'service_type_id' => $serviceType->id,
        'name' => 'Website hosting',
    ]);
});

test('service creation requires an existing service type', function () {
    $user = User::factory()->create();

    $response = $this
        ->withToken(JWTAuth::fromUser($user))
        ->postJson('/api/services', [
            'service_type_id' => 999999,
            'name' => 'Website hosting',
            'price' => 49.99,
            'status' => true,
        ]);

    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['service_type_id']);
});