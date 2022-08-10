<?php
namespace Database\Seeders;

use App\Models\SocialLinks;
use Illuminate\Database\Seeder;

class SocialLinksSeeder extends Seeder
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
                'name'   => 'Facebook',
                'icon'   => 'fa fa-facebook',
                'link'   => 'https://www.facebook.com/CubixSol',
                'status' => 1,
            ],
            [
                'name'   => 'Linkedin',
                'icon'   => 'fa fa-linkedin',
                'link'   => 'https://www.linkedin.com/company/cubixsol/',
                'status' => 1,
            ],
            [
                'name'   => 'Youtube',
                'icon'   => 'fa fa-youtube',
                'link'   => 'https://www.youtube.com/channel/UCidcZrbQ50GtnUEGflc5FGg',
                'status' => 1,
            ],
            [
                'name'   => 'CubixSol',
                'icon'   => 'fa fa-sitemap',
                'link'   => 'https://cubixsol.com',
                'status' => 1,
            ],
        ];

        foreach($array as $arr)
        {
            SocialLinks::create($arr);
        }
    }
}
