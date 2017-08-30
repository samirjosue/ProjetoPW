<?php

use Illuminate\Database\Seeder;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 10; $i <= 50; $i++){
        DB::table('setors')->insert(['descricao' => 'Setor'.$i,
            'sala_id' => rand(1,50), 'curso_id' => rand(1,5),'servidor_id' => rand(1,3)]);
        }
        
    }
}
