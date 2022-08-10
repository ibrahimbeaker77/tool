<?php

namespace Database\Seeders;

use App\Models\BlogCategories;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $array=[
        [
            'title'  =>'EDUCATION blog',
            'slug'   =>'education-blog',
            'status' =>'1',
        ],
        
        [
            'title'  =>'SEO blog',
            'slug'   =>'seo-blog',
            'status' => '1',
         ],

         [
            'title'  =>'LEARN blog',
            'slug'   =>'learn-blog',
            'status' => '1',
         ],

         [
            'title'  =>'TECH blog',
            'slug'   =>'tech-blog',
            'status' => '1',
         ],


    ];
    foreach($array as $arr)
    {
        BlogCategories::create($arr); 
    }
    }
}
