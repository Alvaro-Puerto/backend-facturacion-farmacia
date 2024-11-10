<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Process\Exceptions\ProcessFailedException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Process\Process;

class RestaurarBDJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $filename = "backup-" . date('Y-m-d_H-i-s') . ".sql";
        $command = "C:\xampp\mysql\bin\mysqldump --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD')." --host=".env('DB_HOST')." ".env('DB_DATABASE')." > C:\Users\apuerto\Downloads\EXAMEN-GRADO\backend-facturacion\storage\app\backups\backup.sql";

        $process = Process::fromShellCommandline($command);

        try {
            $process->mustRun();
           
        } catch (ProcessFailedException $exception) {
            error_log('Failed to create database backup: '.$exception->getMessage());
        }
    }
}
