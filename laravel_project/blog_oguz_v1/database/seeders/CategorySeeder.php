<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str; // str slugu kullanmak icin
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // yeni olsuturdugumuz seeder dosyasina ilk geldiyimizde use DB; ekliyoruz


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Ornek DB ile Kullanimi
       *
        DB::table('categories')->insert([
          'name' => 'gunluk yasam'

      ]);
       */

        $categories = ['Eglence','Bilisim','Gezi','Teknoloji','Saglik','Spor','Gunluk Yasam'];
        foreach ($categories as $category){
//            $slug = Str::slug($request->$category);
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => str_slug($category),
                'created_at' =>now(),
                'updated_at' =>now()

            ]);
        }
    }
}
