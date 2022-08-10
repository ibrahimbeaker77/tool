<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Status       array( 0 => 'In Active', 1 => 'Active' )
        // role         array( 1 => 'admin', 2 => 'Customer' )
        // membership   array( 1 => 'Full', 2 => 'Free', 3 => 'Paid' ) 1 for only admin
        // apiKeyStatus array( 0 => 'In Active', 1 => 'Active' )

        $array = [
            [
                'name'                      => 'Aasim Ghaffar',
                'email'                     => 'aasimghaffar442925@gmail.com',
                'phone'                     => '+923233151852',
                'company'                   => 'CubixSol',
                'website'                   => 'https://cubixsol.com',
                'about'                     => '',
                'twoStepVerification'       => 1,
                'twoStepVerificationStatus' => 1,
                'emailNotification'         => 1,
                'securityAlert'             => 1,
                'alwaysSignIn'              => 1,
                'status'                    => 1,
                'role'                      => 1,
                'membership'                => 1,
                'image'                     => 'aasim-ghaffar.png',
                'apiKey'                    => '716d554eeeb5d3c6c7a05b6b661e2119',
                'apiKeyStatus'              => 1,
                'email_verified_at'         => now(),
                'password'                  => bcrypt('aasimghaffar@#!123')
            ],
            [
                'name'                      => 'demo',
                'email'                     => 'demo@demo.com',
                'phone'                     => '',
                'company'                   => 'Demo Company',
                'website'                   => 'https://cubixsol.com',
                'about'                     => '',
                'twoStepVerification'       => 0,
                'twoStepVerificationStatus' => 0,
                'emailNotification'         => 1,
                'securityAlert'             => 1,
                'alwaysSignIn'              => 1,
                'status'                    => 1,
                'role'                      => 2,
                'membership'                => 2,
                'image'                     => 'default.png',
                'apiKey'                    => '716d554eeeb5d3c6c7a05b6b661e2119',
                'apiKeyStatus'              => 1,
                'email_verified_at'         => now(),
                'password'                  => bcrypt('demo@#!123')
            ]
        ];

        foreach($array as $arr)
        {
            User::create($arr);
        }
    }
}
