<?php
namespace Database\Seeders;

use App\Models\Pages;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'name'        => 'About us',
                'slug'        => 'about-us',
                'status'      => '1',
                'feature'     => '01.jpg',
                'description' => '',
            ],
            [
                'name'        => 'Privacy',
                'slug'        => 'privacy',
                'status'      => '1',
                'feature'     => '01.jpg',
                'description' => '',
            ],
            [
                'name'        => 'Terms of Services',
                'slug'        => 'terms-of-services',
                'status'      => '1',
                'feature'     => '01.jpg',
                'description' => '',
            ],
            [
                'name'        => 'Refund Policy',
                'slug'        => 'refund-policy',
                'status'      => '1',
                'feature'     => '01.jpg',
                'description' => '',
            ],
        ];

        foreach($array as $arr)
        {
            Pages::create($arr);
        }
    }
}
