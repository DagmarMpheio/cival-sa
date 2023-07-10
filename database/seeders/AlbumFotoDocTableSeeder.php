<?php

namespace Database\Seeders;

use App\Models\AlbumFotoDoc;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumFotoDocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //apagar tudo da tabela album_foto_docs
        DB::table('album_foto_docs')->truncate(); //apagar todos os dados da tabela

        $nenhum = new AlbumFotoDoc();
        $nenhum->nome_album = "Nenhum";
        $nenhum->save();

        $huila = new AlbumFotoDoc();
        $huila->nome_album = "Huíla";
        $huila->save();

        $cival_sa = new AlbumFotoDoc();
        $cival_sa->nome_album = "Cival SA";
        $cival_sa->save();

        $lubango = new AlbumFotoDoc();
        $lubango->nome_album = "Lubango";
        $lubango->save();
    }
}
