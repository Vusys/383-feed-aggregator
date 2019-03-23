<?php

namespace App\Http\Controllers;

use App\Models\FeedAggregate;
use Illuminate\Http\JsonResponse;

class FeedController extends Controller
{
    public function aggregate(FeedAggregate $feedAggregate): JsonResponse
    {
        $feedAggregate->load('feeds.locations');

        $locations = $feedAggregate->feeds->pluck('locations')->collapse();

        return new JsonResponse([
            'success' => true,
            'data'    => $locations,
        ]);
    }

    public function listAggregates(): JsonResponse
    {
        $aggregates = FeedAggregate::all()
            ->map(function (FeedAggregate $feedAggregate) {
                return $feedAggregate->only(['name', 'slug']);
            });

        return new JsonResponse([
            'success' => true,
            'data'    => $aggregates,
        ]);
    }
}
