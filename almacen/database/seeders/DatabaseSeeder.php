<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Almacen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            DB::table('users')->insert([
               [ 'id' => 1,
                'name' => 'Estefania',
                'email' => 'estefania@gmail.com',
                'apell'=> 'Muñoz',
                'address'=>'C/Rute Nº70',
                'password'=>'$2y$10$4FJvny7dz0WyHQiD8vprAOZhMgtLOo2/6A1alenmRVgNNdpPH7AQ6'],
                ['id' => 2,
                'name' => 'Jesus',
                'email' => 'jesus@gmail.com',
                'apell'=>'Morales',
                'address'=>'C/Alta Nº3',
                'password'=>'$2y$10$4FJvny7dz0WyHQiD8vprAOZhMgtLOo2/6A1alenmRVgNNdpPH7AQ6']
            ]);


            DB::table('productos')->insert([
                ['id'=>1,
                'nombre'=>'detergente',
                'descripcion'=>'Detergente en polvo, para lavadoras de 8kg',
                'fecha_caducidad'=>'2024-05-12',
                'user_id'=>rand(1,2)],
                ['id'=>2,
                'nombre'=>'Champú de cebolla',
                'descripcion'=>'Champú de cebolla para el crecimiento del cabello',
                'fecha_caducidad'=>'2025-06-12',
                'user_id'=>rand(1,2)]
            ]);
            
        Almacen::factory(3)->create();
    }
}
