<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Get unique categories from existing products
        $productCategories = DB::table('products')
            ->select('category')
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');

        // Get existing categories
        $existingCategories = DB::table('categories')->pluck('name')->toArray();

        // Create missing category records
        foreach ($productCategories as $categoryName) {
            if (!in_array($categoryName, $existingCategories)) {
                DB::table('categories')->insert([
                    'name' => $categoryName,
                    'description' => $categoryName . ' parts and components',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Link products to categories
        $categoryRecords = DB::table('categories')->pluck('id', 'name');
        foreach ($categoryRecords as $name => $id) {
            DB::table('products')
                ->where('category', $name)
                ->whereNull('category_id')
                ->update(['category_id' => $id]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove category_id links
        DB::table('products')->update(['category_id' => null]);

        // Delete categories created from products
        $categories = DB::table('products')
            ->select('category')
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');

        DB::table('categories')
            ->whereIn('name', $categories)
            ->delete();
    }
};
