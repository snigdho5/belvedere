<?php

use Illuminate\Database\Seeder;
use App\Package;
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            array(
                'type' => 'member',
                'price' => '10',
                'month' => '3',
            ),
            array(
                'type' => 'member',
                'price' => '20',
                'month' => '6',
            ),
            array(
                'type' => 'member',
                'price' => '30',
                'month' => '9',
            ),
            array(
                'type' => 'member',
                'price' => '40',
                'month' => '12',
            ),


            array(
                'type' => 'sponsor',
                'price' => '40',
                'month' => '6',
            ),
            array(
                'type' => 'sponsor',
                'price' => '40',
                'month' => '9',
            ),
            array(
                'type' => 'sponsor',
                'price' => '40',
                'month' => '12',
            ),
            array(
                'type' => 'sponsor',
                'price' => '40',
                'month' => '12',
            ),



            array(
                'type' => 'advertiser',
                'price' => '40',
                'month' => '3',
            ),
            array(
                'type' => 'advertiser',
                'price' => '40',
                'month' => '6',
            ),
            array(
                'type' => 'advertiser',
                'price' => '40',
                'month' => '9',
            ),
            array(
                'type' => 'advertiser',
                'price' => '40',
                'month' => '12',
            ),

        );


        foreach ($array as $key => $value) {
            Package::create($value);
        }
    }
}
