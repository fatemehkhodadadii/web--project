<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        $userId = User::first()->id;
        $products = Product::all()->toArray();

        $comments = [
            [
                'user_id' => $userId,
                'content' => 'متن آزمایشی'
            ],
            [
                'user_id' => $userId,
                'content' => 'متن آزمایشی'
            ],
            [
                'user_id' => $userId,
                'content' => 'متن آزمایشی'
            ],
            [
                'user_id' => $userId,
                'content' =>'متن آزمایشی' 
            ],
        ];

        foreach ($comments as $comment) {
            $productK = array_rand($products, 1);
            Comment::create($comment + ['product_id' => $products[$productK]['id']]);
        }
    }
}
