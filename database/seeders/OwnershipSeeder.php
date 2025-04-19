<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Ownership;

class OwnershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index) {
            Ownership::create([
                'user_id'=>1,
                'name'=>$faker->name,
                'description'=>$faker->text,
                'registration_number'=>$faker->randomNumber(8, true),
                'lat'=>$faker->latitude,
                'long'=>$faker->longitude,
            ]);
        }
    }
}
