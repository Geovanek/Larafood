<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Grátis',
            'url' => 'gratis',
            'price' => '0.00',
            'description' => 'Versão Gratuita',
        ]);
    }
}
