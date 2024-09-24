<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssuntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dados = array (
            ['descricao' => 'Assunto 1'],
            ['descricao' => 'Assunto 2'],
            ['descricao' => 'Assunto 3'],
            ['descricao' => 'Assunto 4'],
            ['descricao' => 'Assunto 5'],
            ['descricao' => 'Assunto 6'],
            ['descricao' => 'Assunto 7'],
            ['descricao' => 'Assunto 8'],
            ['descricao' => 'Assunto 9'],
            ['descricao' => 'Assunto 10'],
            ['descricao' => 'Assunto 11'],
            ['descricao' => 'Assunto 12'],

        );

        DB::table('assunto')->insert($dados);
    }
}
