<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Compra;
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
                'foto'=>'../../public/storage/img_productos/detergente.jpg',
                'fecha_caducidad'=>'2024-05-12',
                'user_id'=>rand(1,2)],
                ['id'=>2,
                'nombre'=>'Champú de cebolla',
                'descripcion'=>'Champú de cebolla para el crecimiento del cabello',
                'foto'=>'../../public/storage/img_productos/champu.jpg',
                'fecha_caducidad'=>'2025-06-12',
                'user_id'=>rand(1,2)]
            ]);
            DB::table('compras')->insert([
                ['id'=>1,
                'id_producto'=>rand(1,2),
                'id_usuario'=>rand(1,2),
                'precio'=>'30'],
                ['id'=>2,
                'id_producto'=>rand(1,2),
                'id_usuario'=>rand(1,2),
                'precio'=>'30']
            ]);
            Compra::factory(2);
    }
}
