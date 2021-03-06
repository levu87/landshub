<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(user::class);
        $this->call(data_du_an::class);
        $this->call(ads_seed::class);
}
}
