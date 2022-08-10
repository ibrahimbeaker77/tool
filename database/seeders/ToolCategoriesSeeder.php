<?php
namespace Database\Seeders;

use App\Models\ToolCategories;
use Illuminate\Database\Seeder;

class ToolCategoriesSeeder extends Seeder
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
                'title'       => 'Text Modification Tools',
                'slug'        => 'text-modification-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Image Modification Tools',
                'slug'        => 'image-modification-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'SEO Tools',
                'slug'        => 'seo-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Website Optimization Tools',
                'slug'        => 'website-optimization-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Adsense Tools',
                'slug'        => 'adsense-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'URL Tools',
                'slug'        => 'url-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Protocol Tools',
                'slug'        => 'protocol-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Scanning & Security Tools',
                'slug'        => 'scanning-security-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Wordpress Tools',
                'slug'        => 'wordpress-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Screenshort Tools',
                'slug'        => 'screenshort-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Responsiveness Tools',
                'slug'        => 'responsiveness-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Compressing Tools',
                'slug'        => 'compressing-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Downloading Tools',
                'slug'        => 'downloading-tools',
                'status'      => '1',
                'description' => '',
                
            ],
            [
                'title'       => 'Comparison Tools',
                'slug'        => 'comparison-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Searching Tools',
                'slug'        => 'searching-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Conversion Tools',
                'slug'        => 'conversion-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Formatting Tools',
                'slug'        => 'formatting-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Time & Date Tools',
                'slug'        => 'time-Date-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Calculation Tools',
                'slug'        => 'calculation-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Code Generators',
                'slug'        => 'code-generators',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'MySql Query Creation Tools',
                'slug'        => 'mysql-query-creation-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Extract Data Tools',
                'slug'        => 'extract-data-Tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'HTML Tools',
                'slug'        => 'html-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'JSON-LD Schema Tools',
                'slug'        => 'json-ld-schema-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Validation & Verification Tools',
                'slug'        => 'validation-Verification-tools',
                'status'      => '1',
                'description' => '',
            ],
            [
                'title'       => 'Code Formatters Tools',
                'slug'        =>  'code-Formatters-tools',
                'status'      => '1',
                'description' =>'',
            ], 
            [
                'title'       => 'Other Tools',
                'slug'        => 'other-tools',
                'status'      => '1',
                'description' => '',
            ]
        ];

        foreach($array as $arr)
        {
            ToolCategories::create($arr);
        }
    }
}
