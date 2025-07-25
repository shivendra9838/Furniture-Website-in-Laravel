<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class SimpleProductSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing products
        Product::truncate();
        
        // Get or create categories first
        $livingRoom = Category::firstOrCreate(
            ['slug' => 'living-room'], 
            ['name' => 'Living Room', 'description' => 'Comfortable furniture for living spaces']
        );
        
        $bedroom = Category::firstOrCreate(
            ['slug' => 'bedroom'], 
            ['name' => 'Bedroom', 'description' => 'Bedroom furniture for better sleep']
        );
        
        $dining = Category::firstOrCreate(
            ['slug' => 'dining-room'], 
            ['name' => 'Dining Room', 'description' => 'Dining sets and tables']
        );
        
        $office = Category::firstOrCreate(
            ['slug' => 'office'], 
            ['name' => 'Office', 'description' => 'Professional office furniture']
        );
        
        // Create products with proper category relationships
        $products = [
            [
                'name' => 'Modern Sectional Sofa',
                'description' => 'A spacious and comfortable sectional sofa perfect for family gatherings. Features premium fabric upholstery and memory foam cushions.',
                'price' => 1299.99,
                'category_id' => $livingRoom->id,
                'image' => 'images/products/sectional-sofa.jpg',
                'stock' => 15,
                'dimensions' => json_encode(['length' => '280cm', 'width' => '200cm', 'height' => '85cm']),
                'material' => 'Fabric, Memory Foam',
                'color' => 'Grey',
                'weight' => 95.5,
                'warranty_period' => 24,
                'is_featured' => true,
                'is_customizable' => true
            ],
            [
                'name' => 'Luxury Recliner Chair',
                'description' => 'Premium leather recliner with massage function and cup holders. Perfect for relaxation after a long day.',
                'price' => 899.99,
                'category_id' => $livingRoom->id,
                'image' => 'images/products/recliner-chair.jpg',
                'stock' => 8,
                'dimensions' => json_encode(['length' => '85cm', 'width' => '90cm', 'height' => '110cm']),
                'material' => 'Genuine Leather',
                'color' => 'Brown',
                'weight' => 45.0,
                'warranty_period' => 18,
                'is_featured' => true,
                'is_customizable' => false
            ],
            [
                'name' => 'Glass Coffee Table',
                'description' => 'Elegant tempered glass coffee table with chrome legs. Adds a modern touch to any living room.',
                'price' => 349.99,
                'category_id' => $livingRoom->id,
                'image' => 'images/products/coffee-table.jpg',
                'stock' => 12,
                'dimensions' => json_encode(['length' => '120cm', 'width' => '60cm', 'height' => '45cm']),
                'material' => 'Tempered Glass, Chrome',
                'color' => 'Clear',
                'weight' => 25.0,
                'warranty_period' => 12,
                'is_featured' => false,
                'is_customizable' => false
            ],
            [
                'name' => 'King Size Platform Bed',
                'description' => 'Minimalist platform bed with built-in nightstands. Crafted from solid oak wood for durability.',
                'price' => 1599.99,
                'category_id' => $bedroom->id,
                'image' => 'images/products/platform-bed.jpg',
                'stock' => 6,
                'dimensions' => json_encode(['length' => '220cm', 'width' => '200cm', 'height' => '35cm']),
                'material' => 'Solid Oak Wood',
                'color' => 'Natural Oak',
                'weight' => 85.0,
                'warranty_period' => 36,
                'is_featured' => true,
                'is_customizable' => true
            ],
            [
                'name' => 'Mirrored Wardrobe',
                'description' => 'Spacious 3-door wardrobe with full-length mirrors and organized compartments for all your clothing needs.',
                'price' => 799.99,
                'category_id' => $bedroom->id,
                'image' => 'images/products/wardrobe.jpg',
                'stock' => 4,
                'dimensions' => json_encode(['length' => '150cm', 'width' => '60cm', 'height' => '200cm']),
                'material' => 'MDF, Mirror, Metal Handles',
                'color' => 'White',
                'weight' => 120.0,
                'warranty_period' => 24,
                'is_featured' => false,
                'is_customizable' => true
            ],
            [
                'name' => '6-Seater Dining Set',
                'description' => 'Complete dining set with extendable table and 6 comfortable chairs. Perfect for family dinners and entertaining.',
                'price' => 1199.99,
                'category_id' => $dining->id,
                'image' => 'images/products/dining-set.jpg',
                'stock' => 3,
                'dimensions' => json_encode(['table' => '180cm x 90cm x 75cm', 'chairs' => '45cm x 45cm x 95cm']),
                'material' => 'Solid Wood, Fabric Cushions',
                'color' => 'Walnut',
                'weight' => 180.0,
                'warranty_period' => 24,
                'is_featured' => true,
                'is_customizable' => true
            ],
            [
                'name' => 'Executive Office Desk',
                'description' => 'Professional L-shaped desk with built-in cable management and multiple drawers for organized workspace.',
                'price' => 699.99,
                'category_id' => $office->id,
                'image' => 'images/products/office-desk.jpg',
                'stock' => 7,
                'dimensions' => json_encode(['length' => '160cm', 'width' => '120cm', 'height' => '75cm']),
                'material' => 'MDF, Metal Frame',
                'color' => 'Dark Walnut',
                'weight' => 65.0,
                'warranty_period' => 18,
                'is_featured' => true,
                'is_customizable' => false
            ],
            [
                'name' => 'Ergonomic Office Chair',
                'description' => 'High-back ergonomic chair with lumbar support, adjustable armrests, and breathable mesh fabric.',
                'price' => 449.99,
                'category_id' => $office->id,
                'image' => 'images/products/office-chair.jpg',
                'stock' => 15,
                'dimensions' => json_encode(['width' => '65cm', 'depth' => '65cm', 'height' => '110-120cm']),
                'material' => 'Mesh, Foam, Aluminum Base',
                'color' => 'Black',
                'weight' => 18.5,
                'warranty_period' => 12,
                'is_featured' => false,
                'is_customizable' => false
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
        
        $this->command->info('Successfully created ' . count($products) . ' products!');
    }
}
