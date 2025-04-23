<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        DB::table('testimonials')->delete();

        // Create testimonials
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@example.com',
                'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3',
                'comment' => 'The Eames Lounge Chair is absolutely stunning! The quality of the leather and craftsmanship is exceptional. Worth every penny.',
                'rating' => 5,
                'is_approved' => true
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'michael.chen@example.com',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3',
                'comment' => 'The standing desk has transformed my home office. The electric height adjustment is smooth and the bamboo top is beautiful.',
                'rating' => 5,
                'is_approved' => true
            ],
            [
                'name' => 'Emily Rodriguez',
                'email' => 'emily.rodriguez@example.com',
                'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3',
                'comment' => 'The platform bed is exactly what I was looking for. The built-in storage is a game-changer for my small bedroom.',
                'rating' => 4,
                'is_approved' => true
            ],
            [
                'name' => 'David Wilson',
                'email' => 'david.wilson@example.com',
                'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3',
                'comment' => 'The extendable dining table is perfect for our family gatherings. The solid walnut construction is beautiful and durable.',
                'rating' => 5,
                'is_approved' => true
            ],
            [
                'name' => 'Lisa Thompson',
                'email' => 'lisa.thompson@example.com',
                'avatar' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3',
                'comment' => 'The ergonomic office chair has significantly improved my posture and comfort during long work hours.',
                'rating' => 5,
                'is_approved' => true
            ]
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
} 