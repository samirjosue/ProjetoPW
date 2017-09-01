<?php
use Illuminate\Database\Seeder;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nome = array('Maria','Ana','Paula','Gabriela','Raquel','Carol');
    for ($i = 1; $i <= 50; $i++){
			$nome1 = $nome[rand(0,5)];
        DB::table('usuarios')->insert(['name' => $nome1,
        											 'email' => $nome1.$i.'@patrimonio.com',
        											 'password' => bcrypt('123'),
                                        'departamento_id' => rand(1,4),
                                        'tipousuario_id' => rand(1,2)]);
                                        
                                      
        }
			DB::table('usuarios')->insert(['name' => 'SuperAdministrador', 'email' => 'admin@admin.com',
                                           'password' => bcrypt('[admin]'), 'departamento_id' => '1', 'tipousuario_id' => '1']);

    }
}
