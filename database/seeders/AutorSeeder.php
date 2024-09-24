<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dados = array (
            ['nome' => 'Autor 1'],
            ['nome' => 'Autor 2'],
            ['nome' => 'Autor 3'],
            ['nome' => 'Autor 4'],
            ['nome' => 'Autor 5'],
            ['nome' => 'Autor 6'],
            ['nome' => 'Autor 7'],
            ['nome' => 'Autor 8'],
            ['nome' => 'Autor 9'],
            ['nome' => 'Autor 10'],
            ['nome' => 'Autor 11'],
            ['nome' => 'Autor 12'],

        );

        DB::table('autor')->insert($dados);
    }
}
