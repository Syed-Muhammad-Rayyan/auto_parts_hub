<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Get distinct categories from products table
        $categories = DB::table('products')
            ->select('category')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->pluck('category');

        // Insert into categories table
        foreach ($categories as $catName) {
            DB::table('categories')->insertOrIgnore([
                'name' => $catName,
                'description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        // No need to rollback - categories can stay
    }
};



