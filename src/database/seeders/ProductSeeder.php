<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
        'name' => 'キウイ',
        'price' => 800,
        'image' => 'kiwi.png',
        'description' => 'キウイは甘みと酸味のバランスが絶妙なフルーツです。ビタミンCなどの栄養素も豊富のため、美肌効果や疲労回復効果も期待できます。もぎたてフルーツのスムージーをお召し上がりください!'
    ]);
        $product = Product::create([
        'name' => 'ストロベリー',
        'price' => 1200,
        'image' => 'strawberry.png',
        'description' => '大人から'
    ]);
        $product = Product::create([
        'name' => 'オレンジ',
        'price' => 850,
        'image' => 'orange.png',
        'description' =>'当店では'
    ]);
        $product = Product::create([
        'name' => 'スイカ',
        'price' => 700,
        'image' => 'watermelon.png',
        'description' =>'甘くたシャリシャリ'
    ]);
        $product = Product::create([
        'name' => 'ピーチ',
        'price' => 1000,
        'image' => 'peach.png',
        'description' =>'豊潤な香り'
    ]);
        $product = Product::create([
        'name' => 'シャインマスカット',
        'price' => 1400,
        'image' => 'muscat.png',
        'description' =>'爽やかな香り'
    ]);
    $product->seasons()->attach([1, 2]);
    }
}
