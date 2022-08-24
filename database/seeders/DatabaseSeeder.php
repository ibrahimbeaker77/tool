<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(SocialLinksSeeder::class);
        $this->call(CompanyInformationSeeder::class);
        $this->call(SubscribersSeeder::class);
        $this->call(ToolCategoriesSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
