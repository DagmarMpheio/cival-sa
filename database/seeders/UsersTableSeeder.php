<?php

namespace Database\Seeders;

use App\Models\WorkingHour;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //reset a tabela users
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate(); //apagar todos os dados da tabela

        $faker = Factory::create(); //dados falsos(aleatorios)

        //gerar 3 usuarios
        DB::table('users')->insert([
            [
                'email' => 'dagmarmpheiu@gmail.com',
                'telefone' => $faker->phoneNumber(),
                'data_nascimento' => $faker->date(),
                'endereco' => $faker->address(),
                'name' => 'Dagmar Mpheio',
                'genero'=>'Masculino',
                'password' => bcrypt('12345678'),
                'slug' => 'dagmar-mpheio',
                'created_at' => now(),
                'updated_at' => now(),
                'bio' => $faker->text(rand(250, 300)),
                'tipo_cliente' => 'Particular'
            ],
            [
                'email' => 'janedoe@test.com',
                'telefone' => $faker->phoneNumber(),
                'data_nascimento' => $faker->date(),
                'endereco' => $faker->address(),
                'name' => 'Jane Doe',
                'genero'=>'Femenino',
                'password' => bcrypt('secret00'),
                'slug' => 'jane-doe',
                'created_at' => now(),
                'updated_at' => now(),
                'bio' => $faker->text(rand(250, 300)),
                'tipo_cliente' => 'Particular'
            ],
            [
                'email' => 'anamiguel@test.com',
                'telefone' => $faker->phoneNumber(),
                'data_nascimento' => $faker->date(),
                'endereco' => $faker->address(),
                'name' => 'Ana Miguel',
                'genero'=>'Femenino',
                'password' => bcrypt('secret00'),
                'slug' => 'ana-miguel',
                'created_at' => now(),
                'updated_at' => now(),
                'bio' => $faker->text(rand(250, 300)),
                'tipo_cliente' => 'Particular'
            ]
        ]);

        //working hour
        $horarioExpediente = new WorkingHour();
        $horarioExpediente->employee_id = 2;
        $horarioExpediente->date = date("Y/m/d");
        $horarioExpediente->start_time = '08:00';
        $horarioExpediente->finish_time = '15:00';
        $horarioExpediente->save();
    }
}
