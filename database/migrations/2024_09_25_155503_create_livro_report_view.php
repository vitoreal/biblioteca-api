<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::statement("
            CREATE VIEW views_livro_report AS
            (
            select 
                li.id, 
                li.titulo, 
                li.editora, 
                li.edicao, 
                li.ano_publicacao, 
                a.descricao as assunto, 
                a2.nome as autor 
            from livro li
            join livro_assunto la on la.livro_id = li.id 
            join livro_autor la2 on la2.livro_id = li.id
            join assunto a on a.id = la.assunto_id 
            join autor a2 on a2.id = la2.autor_id 
            )
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS views_livro_report');
    }
};
