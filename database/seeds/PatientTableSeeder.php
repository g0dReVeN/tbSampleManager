<?php

use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 33;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('patients')->insert([ //,
                'nhlsid' => "MRN" . $faker->randomNumber(5),
                'surname' => $faker->lastName,
                'firstname' => $faker->firstName,
                'sex' => $faker->randomElement($array = array ('0','1','2')),
                'dateofbirth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'idcheck' => $faker->numberBetween($min = 0, $max = 1)
            ]);
        }
    }
}
