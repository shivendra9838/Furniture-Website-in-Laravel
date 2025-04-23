<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class FurnitureSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        DB::table('products')->delete();
        DB::table('categories')->delete();

        // Create categories
        $categories = [
            [
                'name' => 'Living Room',
                'slug' => 'living-room',
                'description' => 'Stylish furniture for your living space',
                'image' => 'categories/living-room.jpg'
            ],
            [
                'name' => 'Bedroom',
                'slug' => 'bedroom',
                'description' => 'Comfortable bedroom furniture',
                'image' => 'categories/bedroom.jpg'
            ],
            [
                'name' => 'Dining Room',
                'slug' => 'dining-room',
                'description' => 'Elegant dining furniture',
                'image' => 'categories/dining-room.jpg'
            ],
            [
                'name' => 'Office',
                'slug' => 'office',
                'description' => 'Professional office furniture',
                'image' => 'categories/office.jpg'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create products with real data
        $products = [
            // Living Room Furniture
            [
                'name' => 'Eames Lounge Chair',
                'description' => 'Iconic mid-century modern lounge chair with ottoman',
                'price' => 5499.99,
                'category_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-4.0.3',
                'stock' => 5,
                'dimensions' => json_encode(['length' => 32, 'width' => 32, 'height' => 42]),
                'material' => 'Leather and Rosewood',
                'color' => 'Black',
                'weight' => 45.5,
                'warranty_period' => 10,
                'is_featured' => true,
                'is_customizable' => true
            ],
            [
                'name' => 'Chesterfield Sofa',
                'description' => 'Classic leather sofa with deep button tufting',
                'price' => 2999.99,
                'category_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?ixlib=rb-4.0.3',
                'stock' => 8,
                'dimensions' => json_encode(['length' => 84, 'width' => 36, 'height' => 32]),
                'material' => 'Full Grain Leather',
                'color' => 'Chestnut Brown',
                'weight' => 120.0,
                'warranty_period' => 5,
                'is_featured' => true,
                'is_customizable' => true
            ],
            [
                'name' => 'Noguchi Coffee Table',
                'description' => 'Iconic sculptural coffee table with glass top',
                'price' => 1999.99,
                'category_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1530018607912-eff2daa1bac4?ixlib=rb-4.0.3',
                'stock' => 12,
                'dimensions' => json_encode(['length' => 48, 'width' => 30, 'height' => 16]),
                'material' => 'Glass and Wood',
                'color' => 'Clear/Black',
                'weight' => 45.0,
                'warranty_period' => 5,
                'is_featured' => true,
                'is_customizable' => false
            ],

            // Bedroom Furniture
            [
                'name' => 'Platform Bed',
                'description' => 'Modern platform bed with built-in storage',
                'price' => 1299.99,
                'category_id' => 2,
                'image' => 'https://images.unsplash.com/photo-1505693314120-0d443867891c?ixlib=rb-4.0.3',
                'stock' => 15,
                'dimensions' => json_encode(['length' => 80, 'width' => 60, 'height' => 14]),
                'material' => 'Solid Oak',
                'color' => 'Natural',
                'weight' => 150.0,
                'warranty_period' => 5,
                'is_featured' => true,
                'is_customizable' => true
            ],
            [
                'name' => 'Dresser with Mirror',
                'description' => 'Six-drawer dresser with matching mirror',
                'price' => 899.99,
                'category_id' => 2,
                'image' => 'https://images.unsplash.com/photo-1595428774223-ef52624120d2?ixlib=rb-4.0.3',
                'stock' => 10,
                'dimensions' => json_encode(['length' => 60, 'width' => 20, 'height' => 32]),
                'material' => 'Solid Wood',
                'color' => 'White',
                'weight' => 85.0,
                'warranty_period' => 5,
                'is_featured' => false,
                'is_customizable' => true
            ],

            // Dining Room Furniture
            [
                'name' => 'Extendable Dining Table',
                'description' => 'Solid wood dining table with extension leaf',
                'price' => 1499.99,
                'category_id' => 3,
                'image' => 'https://images.unsplash.com/photo-1617806118233-18e1de247200?ixlib=rb-4.0.3',
                'stock' => 8,
                'dimensions' => json_encode(['length' => 72, 'width' => 42, 'height' => 30]),
                'material' => 'Solid Walnut',
                'color' => 'Natural',
                'weight' => 200.0,
                'warranty_period' => 5,
                'is_featured' => true,
                'is_customizable' => true
            ],
            [
                'name' => 'Dining Chairs Set',
                'description' => 'Set of 6 modern dining chairs',
                'price' => 899.99,
                'category_id' => 3,
                'image' => 'https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?ixlib=rb-4.0.3',
                'stock' => 12,
                'dimensions' => json_encode(['length' => 20, 'width' => 20, 'height' => 36]),
                'material' => 'Wood and Fabric',
                'color' => 'Black/Beige',
                'weight' => 15.0,
                'warranty_period' => 5,
                'is_featured' => false,
                'is_customizable' => true
            ],

            // Office Furniture
            [
                'name' => 'Standing Desk',
                'description' => 'Electric height-adjustable standing desk',
                'price' => 799.99,
                'category_id' => 4,
                'image' => 'https://images.unsplash.com/photo-1522155174216-12bb1f5df470?ixlib=rb-4.0.3',
                'stock' => 20,
                'dimensions' => json_encode(['length' => 60, 'width' => 30, 'height' => 50]),
                'material' => 'Bamboo and Steel',
                'color' => 'Natural/Black',
                'weight' => 85.0,
                'warranty_period' => 5,
                'is_featured' => true,
                'is_customizable' => false
            ],
            [
                'name' => 'Ergonomic Office Chair',
                'description' => 'High-back ergonomic chair with lumbar support',
                'price' => 499.99,
                'category_id' => 4,
                'image' => 'https://images.unsplash.com/photo-1505843490538-5133c6c7d0e1?ixlib=rb-4.0.3',
                'stock' => 25,
                'dimensions' => json_encode(['length' => 26, 'width' => 26, 'height' => 48]),
                'material' => 'Mesh and Aluminum',
                'color' => 'Black',
                'weight' => 35.0,
                'warranty_period' => 5,
                'is_featured' => true,
                'is_customizable' => true
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 