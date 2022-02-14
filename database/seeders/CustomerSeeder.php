<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'first_name' => 'Publico',
            'last_name' => 'en General',
            'email' => 'sin_coreo',
            'phone' => '0000000000',
            'address' => 'Sin domicilio',
        ]);
    }
}
