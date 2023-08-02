<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $erkek = Category::create([
            'image'=> null,
            'thumbnail'=> null ,
            'cat_ust' => null,
            'name'=> 'Erkek',
            'content'=> 'Erkek Giyim',
            'status' => '1'
        ]);

        Category::create([
            'image'=> null,
            'thumbnail'=> null ,
            'cat_ust' => $erkek->id,
            'name'=> 'Erkek Kazak',
            'content'=> 'Erkek Kazaklar',
            'status' => '1'
        ]);

        Category::create([
            'image'=> null,
            'thumbnail'=> null ,
            'cat_ust' => $erkek->id,
            'name'=> 'Erkek Pantolon',
            'content'=> 'Erkek Pantolonlar',
            'status' => '1'
        ]);

        $kadin = Category::create([
            'image'=> null,
            'thumbnail'=> null ,
            'cat_ust' => null,
            'name'=> 'Kadin',
            'content'=> 'Kadin Giyim',
            'status' => '1'
        ]);

        Category::create([
            'image'=> null,
            'thumbnail'=> null ,
            'cat_ust' => $kadin->id,
            'name'=> 'Kadin Canta',
            'content'=> 'Kadin Cantalar',
            'status' => '1'
        ]);
        Category::create([
            'image'=> null,
            'thumbnail'=> null ,
            'cat_ust' => $kadin->id,
            'name'=> 'Kadin Pantolon',
            'content'=> 'Kadin Pantolonlar',
            'status' => '1'
        ]);

        $cocuk = Category::create([
            'image'=> null,
            'thumbnail'=> null ,
            'cat_ust' => null,
            'name'=> 'Cocuk',
            'content'=> 'Cocuk Giyim',
            'status' => '1'
        ]);
        Category::create([
            'image'=> null,
            'thumbnail'=> null ,
            'cat_ust' => $cocuk->id,
            'name'=> 'Cocuk oyuncak',
            'content'=> 'Cocuk Oyuncaklar',
            'status' => '1'
        ]);
        Category::create([
            'image'=> null,
            'thumbnail'=> null ,
            'cat_ust' => $cocuk->id,
            'name'=> 'Cocuk Pantolon',
            'content'=> 'Cocuk Pantolonlar',
            'status' => '1'
        ]);
    }
}
