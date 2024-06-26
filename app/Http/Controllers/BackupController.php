<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function download()
    {
        // Nombre del archivo de backup
        $fileName = 'backup-' . date('Y-m-d_H-i-s') . '.sql';

        // Ruta donde se almacenará temporalmente el archivo de backup
        $backupFilePath = storage_path($fileName);

        // Ejecutar el comando mysqldump para crear el respaldo
        $command = sprintf(
            'mysqldump --host=%s --port=%s --user=%s --password=%s %s > %s',
            env('DB_HOST', 'localhost'),
            env('DB_PORT', '3306'),
            env('DB_USERNAME', 'root'),
            env('DB_PASSWORD', ''),
            env('DB_DATABASE', 'app'),
            $backupFilePath
        );

        // Ejecutar el comando en el sistema
        exec($command);

        // Verificar si se creó correctamente el archivo de backup
        if (file_exists($backupFilePath)) {
            // Descargar el archivo de backup
            return response()->download($backupFilePath, $fileName)->deleteFileAfterSend(true);
        } else {
            abort(500, 'Error while creating backup.');
        }
    }
}
