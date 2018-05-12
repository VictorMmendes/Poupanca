<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pessoa_models')->insert(['nome' => 'Victor Mendes Martins', 'saldo' => 1.0, 'senha' => '120412']);
    }
}
