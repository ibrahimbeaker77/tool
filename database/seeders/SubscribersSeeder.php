<?php
namespace Database\Seeders;

use App\Models\subscribers;
use Illuminate\Database\Seeder;

class SubscribersSeeder extends Seeder
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
                'user_id' => 1,
                'email'   => 'aasimghaffar442925@gmail.com',
                'status'  => '1',
            ],
            [
                'user_id' => 2,
                'email'   => 'demo@demo.com',
                'status'  => '1',
            ]
        ];

        foreach($array as $arr)
        {
            subscribers::create($arr);
        }
    }
}
