<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing products first
        Product::truncate();
        
        // Get or create categories
        $livingRoom = Category::firstOrCreate(['slug' => 'living-room'], ['name' => 'Living Room', 'description' => 'Comfortable furniture for living spaces']);
        $bedroom = Category::firstOrCreate(['slug' => 'bedroom'], ['name' => 'Bedroom', 'description' => 'Bedroom furniture for better sleep']);
        $dining = Category::firstOrCreate(['slug' => 'dining-room'], ['name' => 'Dining Room', 'description' => 'Dining sets and tables']);
        $office = Category::firstOrCreate(['slug' => 'office'], ['name' => 'Office', 'description' => 'Professional office furniture']);
        $outdoor = Category::firstOrCreate(['slug' => 'outdoor'], ['name' => 'Outdoor', 'description' => 'Weather-resistant outdoor furniture']);
        
        $products = [
            // Living Room Furniture
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

            // Bedroom Furniture
            [
                'name' => 'King Size Platform Bed',
                'description' => 'Minimalist platform bed with built-in nightstands. Crafted from solid oak wood for durability.',
                'price' => 1599.99,
                'category_id' => 2, // Bedroom
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
                'category_id' => 2,
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
                'name' => 'Bedside Table Set',
                'description' => 'Matching pair of bedside tables with drawers and open shelving. Perfect complement to any bedroom.',
                'price' => 299.99,
                'category_id' => 2,
                'image' => 'images/products/bedside-table.jpg',
                'stock' => 10,
                'dimensions' => json_encode(['length' => '40cm', 'width' => '35cm', 'height' => '60cm']),
                'material' => 'Pine Wood',
                'color' => 'White',
                'weight' => 15.0,
                'warranty_period' => 12,
                'is_featured' => false,
                'is_customizable' => false
            ],

            // Dining Room Furniture
            [
                'name' => '6-Seater Dining Set',
                'description' => 'Complete dining set with extendable table and 6 comfortable chairs. Perfect for family dinners and entertaining.',
                'price' => 1199.99,
                'category_id' => 3, // Dining Room
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
                'name' => 'Bar Stool Set',
                'description' => 'Set of 4 adjustable bar stools with swivel function. Industrial design with comfortable padding.',
                'price' => 399.99,
                'category_id' => 3,
                'image' => 'images/products/bar-stools.jpg',
                'stock' => 8,
                'dimensions' => json_encode(['diameter' => '35cm', 'height' => '60-80cm adjustable']),
                'material' => 'Metal, PU Leather',
                'color' => 'Black',
                'weight' => 8.0,
                'warranty_period' => 12,
                'is_featured' => false,
                'is_customizable' => false
            ],

            // Office Furniture
            [
                'name' => 'Executive Office Desk',
                'description' => 'Professional L-shaped desk with built-in cable management and multiple drawers for organized workspace.',
                'price' => 699.99,
                'category_id' => 4, // Office
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
                'category_id' => 4,
                'image' => 'images/products/office-chair.jpg',
                'stock' => 15,
                'dimensions' => json_encode(['width' => '65cm', 'depth' => '65cm', 'height' => '110-120cm']),
                'material' => 'Mesh, Foam, Aluminum Base',
                'color' => 'Black',
                'weight' => 18.5,
                'warranty_period' => 12,
                'is_featured' => false,
                'is_customizable' => false
            ],

            // Outdoor Furniture
            [
                'name' => 'Patio Dining Set',
                'description' => 'Weather-resistant outdoor dining set with table and 4 chairs. Perfect for garden parties and BBQs.',
                'price' => 899.99,
                'category_id' => 5, // Outdoor
                'image' => 'images/products/patio-set.jpg',
                'stock' => 5,
                'dimensions' => json_encode(['table' => '150cm x 90cm x 75cm', 'chairs' => '60cm x 60cm x 85cm']),
                'material' => 'Teak Wood, Stainless Steel',
                'color' => 'Natural Teak',
                'weight' => 75.0,
                'warranty_period' => 12,
                'is_featured' => false,
                'is_customizable' => true
            ],
            [
                'name' => 'Garden Lounge Set',
                'description' => 'Comfortable outdoor lounge set with weather-resistant cushions. Includes sofa, chairs, and coffee table.',
                'price' => 1299.99,
                'category_id' => 5,
                'image' => 'images/products/garden-lounge.jpg',
                'stock' => 2,
                'dimensions' => json_encode(['sofa' => '200cm x 85cm x 70cm', 'chairs' => '85cm x 85cm x 70cm']),
                'material' => 'Rattan, Aluminum Frame',
                'color' => 'Natural Rattan',
                'weight' => 95.0,
                'warranty_period' => 18,
                'is_featured' => true,
                'is_customizable' => false
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
