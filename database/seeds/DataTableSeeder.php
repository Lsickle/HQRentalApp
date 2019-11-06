<?php

use Illuminate\Database\Seeder;
use App\Data;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = factory(App\Data::class, 25)->create();
    }
}
