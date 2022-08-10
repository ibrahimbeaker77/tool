<?php
namespace Database\Seeders;

use App\Models\CompanyInformation;
use Illuminate\Database\Seeder;

class CompanyInformationSeeder extends Seeder
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
                'name'   => 'Email',
                'icon'   => 'fe fe-mail',
                'value'  => 'info@cubixsol.com',
                'link'   => 'mailto:info@cubixsol.com',
                'status' => 1,
            ],
            [
                'name'   => 'Phone',
                'icon'   => 'fe fe-phone',
                'value'  => '+923001899983',
                'link'   => 'tel:+923001899983',
                'status' => 1,
            ],
            [
                'name'   => 'Website',
                'icon'   => 'fe fe-globe',
                'value'  => 'www.cubixsol.com',
                'link'   => 'https://cubixsol.com',
                'status' => 1,
            ],
        ];

        foreach($array as $arr)
        {
            CompanyInformation::create($arr);
        }
    }
}
