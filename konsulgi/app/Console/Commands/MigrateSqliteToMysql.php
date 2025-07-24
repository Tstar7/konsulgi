<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Pasien;
use App\Models\AhliGizi;
use App\Models\Message;

class MigrateSqliteToMysql extends Command
{
    protected $signature = 'migrate:sqlite-to-mysql';
    protected $description = 'Copy data from SQLite to MySQL';

    public function handle()
    {
        $this->info('Memigrasi data dari SQLite ke MySQL...');

        // Ambil data dari SQLite (koneksi sqlite_old)
        $pasiens = DB::connection('sqlite_old')->table('pasiens')->get();
        $ahliGizi = DB::connection('sqlite_old')->table('ahli_gizis')->get();
        $messages = DB::connection('sqlite_old')->table('messages')->get();

        // Simpan ke database MySQL
        foreach ($pasiens as $pasien) {
            Pasien::create((array) $pasien);
        }

        foreach ($ahliGizi as $ag) {
            AhliGizi::create((array) $ag);
        }

        foreach ($messages as $msg) {
            Message::create((array) $msg);
        }

        $this->info('Selesai migrasi data!');
    }
}
