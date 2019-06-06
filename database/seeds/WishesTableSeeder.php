<?php

use App\Wish;
use Illuminate\Database\Seeder;

class WishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Wish::class, 50)->create();
    }
}
