<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function show(string $class): View
    {
        $data = match ($class) {
            'economy' => [
                'title' => 'Economy Class',
                'description' => 'Smart comfort for everyday travelers, with generous legroom and modern amenities.',
                'hero_image' => 'https://images.unsplash.com/photo-1762960246763-dcb1e92b0b58?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8ZWNvbm9teSUyMGNsYXNzfGVufDB8fDB8fHww',
                'price_multiplier' => 1.0,
                'features' => [
                    '30kg Baggage',
                    'In-flight WiFi',
                    'Ergonomic Seating',
                    'USB Power',
                    'Complimentary Snacks',
                    'Mood Lighting',
                ],
                'reviews' => [
                    [
                        'name' => 'Sofia K.',
                        'avatar' => 'https://i.pravatar.cc/120?img=32',
                        'rating' => 5,
                        'comment' => 'Surprisingly spacious and quiet. The crew was fantastic.',
                    ],
                    [
                        'name' => 'Jamal R.',
                        'avatar' => 'https://i.pravatar.cc/120?img=12',
                        'rating' => 4,
                        'comment' => 'Great value for the price. WiFi was stable the whole flight.',
                    ],
                    [
                        'name' => 'Alicia M.',
                        'avatar' => 'https://i.pravatar.cc/120?img=8',
                        'rating' => 5,
                        'comment' => 'Clean cabin, smooth boarding, and comfy seats.',
                    ],
                ],
            ],
            'business' => [
                'title' => 'Business Class',
                'description' => 'A refined, productivity-first experience with elevated dining and premium cabin space.',
                'hero_image' => 'https://plus.unsplash.com/premium_photo-1661901904284-4767adf0a8fe?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8YnVpc25lc3MlMjBhaXJsaW5lfGVufDB8fDB8fHww',
                'price_multiplier' => 2.5,
                'features' => [
                    'Priority Boarding',
                    'Lie-flat Seats',
                    'Gourmet Dining',
                    'Noise-Cancelling Headphones',
                    'Private Storage',
                    'Exclusive Lounge Access',
                ],
                'reviews' => [
                    [
                        'name' => 'Ethan W.',
                        'avatar' => 'https://i.pravatar.cc/120?img=15',
                        'rating' => 5,
                        'comment' => 'Seat comfort was next-level. I worked and slept with ease.',
                    ],
                    [
                        'name' => 'Priya S.',
                        'avatar' => 'https://i.pravatar.cc/120?img=44',
                        'rating' => 4,
                        'comment' => 'Dining was excellent and the service felt truly premium.',
                    ],
                    [
                        'name' => 'Marcus L.',
                        'avatar' => 'https://i.pravatar.cc/120?img=56',
                        'rating' => 5,
                        'comment' => 'Smooth boarding, quiet cabin, and incredible legroom.',
                    ],
                ],
            ],
            'first' => [
                'title' => 'First Class',
                'description' => 'The pinnacle of luxury travel—private suites, curated dining, and bespoke service.',
                'hero_image' => 'https://plus.unsplash.com/premium_photo-1682096459254-781ef26d33f8?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'price_multiplier' => 4.0,
                'features' => [
                    'Private Suite',
                    'On-board Shower',
                    'Chef-curated Menu',
                    'Chauffeur Service',
                    'Silk Bedding',
                    'Dedicated Concierge',
                ],
                'reviews' => [
                    [
                        'name' => 'Olivia D.',
                        'avatar' => 'https://i.pravatar.cc/120?img=5',
                        'rating' => 5,
                        'comment' => 'Unmatched luxury. The suite felt like a five-star hotel.',
                    ],
                    [
                        'name' => 'Hiro T.',
                        'avatar' => 'https://i.pravatar.cc/120?img=65',
                        'rating' => 5,
                        'comment' => 'From check-in to landing, everything was flawless.',
                    ],
                    [
                        'name' => 'Nora B.',
                        'avatar' => 'https://i.pravatar.cc/120?img=21',
                        'rating' => 5,
                        'comment' => 'The service is truly bespoke. Worth every mile.',
                    ],
                ],
            ],
            default => [],
        };

        if (empty($data)) {
            abort(404);
        }

        return view('experience.details', $data + ['class' => $class]);
    }
}
