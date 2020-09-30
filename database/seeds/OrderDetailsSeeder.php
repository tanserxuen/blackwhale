<?php

use Illuminate\Database\Seeder;
use App\OrderDetails;

class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrderDetails::class, 10)->create();
    }
}
