<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create regular user
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Create categories
        $electronics = Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic devices and gadgets',
        ]);

        $clothing = Category::create([
            'name' => 'Clothing',
            'description' => 'Shirts, pants, and other wearables',
        ]);

        // Create products
        Product::create([
            'name' => 'Smartphone',
            'description' => 'Latest smartphone with amazing features',
            'price' => 999.99,
            'category_id' => $electronics->id,
        ]);

        Product::create([
            'name' => 'Laptop',
            'description' => 'Powerful laptop for work and gaming',
            'price' => 1299.99,
            'category_id' => $electronics->id,
        ]);

        Product::create([
            'name' => 'T-Shirt',
            'description' => 'Comfortable cotton t-shirt',
            'price' => 19.99,
            'category_id' => $clothing->id,
        ]);

        Product::create([
            'name' => 'Jeans',
            'description' => 'Stylish jeans for everyday wear',
            'price' => 49.99,
            'category_id' => $clothing->id,
        ]);
    }
}
