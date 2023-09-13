<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GlazeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('glazes')->insert([
                'name' => $faker->name,
                'dept' => $faker->randomElement(['Glaze', 'Engobe']),
                'shift' => $faker->randomElement(['1', '2', '3']),
                'grub' => $faker->randomElement(['A', 'B', 'C', 'D']),
                'spray' => $faker->numberBetween(1, 100),
                'density' => $faker->numberBetween(100, 200),
                'viscosity' => $faker->numberBetween(50, 150),
                'weight' => $faker->numberBetween(500, 1000),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}
