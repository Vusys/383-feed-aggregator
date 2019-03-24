<?php

namespace Tests\Feature;

use App\Models\Feed;
use App\Models\FeedAggregate;
use App\Models\Location;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopPlacesTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /** @test */
    public function a_valid_feed_aggregate_slug_returns_success(): void
    {
        FeedAggregate::create([
            'name' => 'Test Slug',
            'slug' => 'test-slug',
        ]);

        $response = $this->get('/api/v1/places/top-places/test-slug');

        $response->assertStatus(200);
        $response->assertJson(['success' => true, 'data' => []]);
    }

    /** @test */
    public function an_invalid_feed_aggregate_slug_returns_fail(): void
    {
        FeedAggregate::create([
            'name' => 'Test Slug',
            'slug' => 'test-slug',
        ]);

        $response = $this->get('/api/v1/places/top-places/nope');

        $response->assertStatus(404);
        $response->assertJson(['success' => false, 'message' => 'No resource found']);
    }

    /** @test */
    public function a_valid_feed_aggregate_slug_with_locations_returns_locations(): void
    {
        $feedAggregate = FeedAggregate::create([
            'name' => 'Test Slug',
            'slug' => 'test-slug',
        ]);

        /** @var Feed $feed */
        $feed = Feed::make([
            'url'    => 'https://example.com/feed.json',
            'parser' => 'example',
        ]);

        $feedAggregate->feeds()->save($feed);
        $feed->save();

        $locations = [
            Location::make(['name' => 'Test Location', 'link' => 'https://example.com', 'image' => 'https://example.com',]),
        ];

        $feed->locations()->saveMany($locations);

        $response = $this->get('/api/v1/places/top-places/test-slug');

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'data'    => [
                [
                    'name'        => 'Test Location',
                    'description' => null,
                    'link'        => 'https://example.com',
                    'image'       => 'https://example.com',
                    'latitude'    => null,
                    'longitude'   => null,
                ],
            ],
        ]);
    }
}
