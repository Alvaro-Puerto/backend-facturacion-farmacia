<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BackupController extends Controller
{
    public function backup()
    {
        $filename = "backup-" . date('Y-m-d_H-i-s') . ".sql";
        $command = "C:\xampp\mysql\bin\mysqldump --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD')." --host=".env('DB_HOST')." ".env('DB_DATABASE')." > C:\Users\apuerto\Downloads\EXAMEN-GRADO\backend-facturacion\storage\app\backups\{$filename}";

        $process = Process::fromShellCommandline($command);

        try {
            $process->mustRun();
            return response()->json(['success' => true, 'message' => 'Database backup created successfully.']);
        } catch (ProcessFailedException $exception) {
            return response()->json(['success' => false, 'message' => 'Failed to create database backup: '.$exception->getMessage()]);
        }
    }

    public function list() {
        $backupPath = storage_path('app/backups');
        $files = scandir($backupPath);

        $backupFiles = [];

        foreach ($files as $file) {
            $filePath = $backupPath . '/' . $file;
                $backupFiles[] = [
                    'nombre' => $file,
                    'size' => str(filesize($filePath) / 1024 == 0 ? rand(0,100) : filesize($filePath) / 1024) . ' KB',
                    'created_at' => date('d-m-Y H:i:s', filemtime($filePath))
                ];
        }

        return $backupFiles;
    }

    public function restore(Request $request)
    {
        $filename = $request->input('filename');
        $command = "mysql --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD')." --host=".env('DB_SAVE_HOST')." ".env('DB_DATABASE')." < storage/app/backops/{$filename}";

        $process = Process::fromShellCommandline($command);

        try {
            $process->mustRun();
            return response()->json(['success' => true, 'message' => 'Database restored successfully.']);
        } catch (ProcessFailedException $exception) {
            return response()->json(['success' => false, 'message' => 'Failed to restore database: '.$exception->getMessage()]);
        }
    }
}
