<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Living Room',
                'slug' => 'living-room',
                'description' => 'Comfortable and stylish furniture for your living space',
                'image' => 'images/categories/living-room.jpg'
            ],
            [
                'name' => 'Bedroom',
                'slug' => 'bedroom',
                'description' => 'Cozy and elegant bedroom furniture for a perfect night\'s sleep',
                'image' => 'images/categories/bedroom.jpg'
            ],
            [
                'name' => 'Dining Room',
                'slug' => 'dining-room',
                'description' => 'Beautiful dining sets for memorable family meals',
                'image' => 'images/categories/dining-room.jpg'
            ],
            [
                'name' => 'Office',
                'slug' => 'office',
                'description' => 'Professional and ergonomic office furniture',
                'image' => 'images/categories/office.jpg'
            ],
            [
                'name' => 'Outdoor',
                'slug' => 'outdoor',
                'description' => 'Weather-resistant outdoor furniture for your patio and garden',
                'image' => 'images/categories/outdoor.jpg'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
