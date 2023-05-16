<?php

namespace Database\Seeders;

use App\Models\HasilPanen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class HasilPanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HasilPanen::insert(
            [
                [
                    'user' => "001",
                    'blok' => "001",
                    'metode' => 'manual',
                    'matang' => 10,
                    'mentah' => 5,
                ],
                [
                    'user' => "001",
                    'blok' => "002",
                    'metode' => 'manual',
                    'matang' => 15,
                    'mentah' => 10,
                ],
                [
                    'user' => "001",
                    'blok' => "003",
                    'metode' => 'mekanis',
                    'matang' => 20,
                    'mentah' => 10,
                ],
                [
                    'user' => "001",
                    'blok' => "004",
                    'metode' => 'mekanis',
                    'matang' => 10,
                    'mentah' => 20,
                ],
                [
                    'user' => "002",
                    'blok' => "005",
                    'metode' => 'manual',
                    'matang' => 15,
                    'mentah' => 10,
                ],
                [
                    'user' => "002",
                    'blok' => "006",
                    'metode' => 'mekanis',
                    'matang' => 10,
                    'mentah' => 10,
                ],
                [
                    'user' => "002",
                    'blok' => "007",
                    'metode' => 'manual',
                    'matang' => 15,
                    'mentah' => 15,
                ],
            ]
        );
    }
}
