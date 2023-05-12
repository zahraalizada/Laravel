<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = ['Hakkimizda', 'Kariyer', 'Vizyonumuz', 'Misyonumuz'];
        $count =0;
        foreach ($pages as $page) {
            $count++;
            DB::table('pages')->insert([
                'title' => $page,
                'slug' => str_slug($page),
                'image' =>'https://www.thebalancemoney.com/thmb/QwUIfnT82yrLj0HQv1H_3Jo_W8A=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/two-young-women-having-a-discussion-in-a-business-607477463-4c806dd0eb2b45c39c2ba7af6b558903.jpg',
                'content' => 'Lorem ipsum dolor sit amet, constectetur adipisicing elit,
                            sed do psum dolor sit amet, constectetur adipisicing elit
                            psum dolor sit amet, constectetur adipisicing elit psum
                            dolor sit amet, constectetur adipisicing elit.',
                'order' => $count,
                'created_at' =>now(),
                'updated_at' =>now()
            ]);
        }
    }
}
