<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Product;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            return; // No products to review
        }

        $reviews = [
            [
                'customer_name' => 'Ahmed Khan',
                'customer_email' => 'ahmed.khan@email.com',
                'rating' => 5,
                'title' => 'Excellent Quality Parts',
                'comment' => 'These parts are of outstanding quality and fit perfectly in my Toyota Corolla. Highly recommended for anyone looking for reliable auto parts.',
                'status' => 'approved',
            ],
            [
                'customer_name' => 'Sara Ahmed',
                'customer_email' => 'sara.ahmed@email.com',
                'rating' => 4,
                'title' => 'Good Service',
                'comment' => 'Fast delivery and good packaging. The brake pads work great, though they were a bit noisier than expected initially.',
                'status' => 'approved',
            ],
            [
                'customer_name' => 'Muhammad Ali',
                'customer_email' => 'muhammad.ali@email.com',
                'rating' => 5,
                'title' => 'Perfect Fit',
                'comment' => 'Ordered engine oil filter for my Honda Civic. Perfect fit and excellent price. Will definitely order again.',
                'status' => 'approved',
            ],
            [
                'customer_name' => 'Fatima Noor',
                'customer_email' => 'fatima.noor@email.com',
                'rating' => 3,
                'title' => 'Average Experience',
                'comment' => 'The spark plugs work fine, but delivery took longer than expected. Overall satisfactory.',
                'status' => 'approved',
            ],
            [
                'customer_name' => 'John Smith',
                'customer_email' => 'john.smith@email.com',
                'rating' => 4,
                'title' => 'Great Value',
                'comment' => 'Good quality tires at reasonable prices. Installation was easy and they perform well on highways.',
                'status' => 'pending',
            ],
            [
                'customer_name' => 'Ayesha Malik',
                'customer_email' => 'ayesha.malik@email.com',
                'rating' => 5,
                'title' => 'Amazing Customer Service',
                'comment' => 'Not only are the parts high quality, but the customer service is exceptional. They helped me identify the right parts for my car.',
                'status' => 'pending',
            ],
        ];

        foreach ($reviews as $reviewData) {
            $product = $products->random();
            Review::create(array_merge($reviewData, ['product_id' => $product->id]));
        }
    }
}
