<?php

namespace Tests\Feature;


use App\Models\FeedAggregate;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListAggregatesTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /** @test */
    public function feed_aggregates_can_be_empty(): void
    {
        $response = $this->get('/api/v1/aggregates');

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data'    => [],
        ]);
    }

    /** @test */
    public function feed_aggregates_can_be_listed(): void
    {
        FeedAggregate::create([
            'name' => 'Test Slug',
            'slug' => 'test-slug',
        ]);

        $response = $this->get('/api/v1/aggregates');

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data'    => [
                [
                    'name' => 'Test Slug',
                    'slug' => 'test-slug',
                ],
            ],
        ]);
    }
}