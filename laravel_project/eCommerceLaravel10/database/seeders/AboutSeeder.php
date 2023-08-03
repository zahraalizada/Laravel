<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'name'=>'Pratic Shop E-ticaret',
            'content'=>'Hakkimizda yazisi burada',
            'text_1_icon'=>'icon-truck',
            'text_1'=>'Ucretsiz Kargo',
            'text_1_content'=>'Urunlerinizi ucretsiz kargo saglariz.',
            'text_2_icon'=>'icon-refresh2',
            'text_2'=>'Geri Iade',
            'text_2_content'=>'30 gun icinde geri iade saglariz.',
            'text_3_icon'=>'icon-help',
            'text_3'=>'Destek',
            'text_3_content'=>'7/24 Bize ulasabilirsiniz.',

        ]);
    }
}
