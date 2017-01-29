<?php

use Illuminate\Database\Seeder;
use App\Models\SiteConfiguration;
use Illuminate\Database\QueryException;

class SiteConfigTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Truncate data
        SiteConfiguration::truncate();
        $organizationName = config('app.name');
        try {
            SiteConfiguration::create([
                'label' => 'Organization name',
                'key' => 'organization_name',
                'value' => config('app.name'),
                'sequence' => 1,
                'field_type' => 'input'
            ]);
            SiteConfiguration::create([
                'label' => 'Admin E-mail',
                'key' => 'admin_email',
                'value' => env('ADMIN_EMAIL'),
                'sequence' => 2,
                'field_type' => 'input'
            ]);
            SiteConfiguration::create([
                'label' => 'Mobile number',
                'key' => 'mobile_number',
                'value' => env('ADMIN_MOBILE_NUMBER'),
                'sequence' => 3,
                'field_type' => 'input'
            ]);
            SiteConfiguration::create([
                'label' => 'Address',
                'key' => 'address',
                'value' => '4th Floor, UNI Building, Thimmiah Road <br>
Vasanth Nagar
Bangalore - 560052',
                'sequence' => 4,
                'field_type' => 'text'
            ]);
            SiteConfiguration::create([
                'label' => 'Facebook link',
                'key' => 'facebook_link',
                'value' => '',
                'sequence' => 5,
                'field_type' => 'input'
            ]);
            SiteConfiguration::create([
                'label' => 'Twitter link',
                'key' => 'twitter_link',
                'value' => '',
                'sequence' => 6,
                'field_type' => 'input'
            ]);
            SiteConfiguration::create([
                'label' => 'Google plus link',
                'key' => 'google_plus_link',
                'value' => '',
                'sequence' => 7,
                'field_type' => 'input'
            ]);
            SiteConfiguration::create([
                'label' => 'Linkedin link',
                'key' => 'linkedin_link',
                'value' => '',
                'sequence' => 8,
                'field_type' => 'input'
            ]);
            SiteConfiguration::create([
                'label' => 'Google analytics',
                'key' => 'google_analytics',
                'value' => '',
                'sequence' => 9,
                'field_type' => 'text'
            ]);
            SiteConfiguration::create([
                'label' => 'Copy righ',
                'key' => 'copy_right',
                'value' => '',
                'sequence' => 10,
                'field_type' => 'input'
            ]);
        } catch (QueryException $e) {
            die('Some exception occured. <br/>' . $e->getMessage());
        }

        echo ' Site config data successfully inserted' . PHP_EOL;
    }

}
