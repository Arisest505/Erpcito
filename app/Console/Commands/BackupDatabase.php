<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BackupDatabase extends Command
{
    protected $signature = 'backup:database';

    protected $description = 'Back up the application database';

    public function handle()
    {
        // Comando para generar el respaldo de la base de datos MySQL
        $backupFileName = 'backup_' . date('Y-m-d_His') . '.sql';
        $backupFilePath = storage_path('app/backups/' . $backupFileName);

        // Reemplaza 'database' con el nombre de tu base de datos MySQL
        Artisan::call('db:dump', [
            '--database' => 'database',
            '--output' => $backupFilePath,
        ]);

        $this->info('Database backup complete: ' . $backupFileName);
    }
}
