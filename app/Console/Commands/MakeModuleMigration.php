<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeModuleMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'make:module-migration {module : The name of the module} {name : The name of the migration}';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Create a new module migration ensuring it is last alphabetically within the module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $moduleName = $this->argument('module');
        $migrationName = $this->argument('name');

        $relativePath = "app/Modules/$moduleName/database/migrations";
        $moduleMigrationsPath = base_path($relativePath);

        // Ensure the directory exists
        if (!is_dir($moduleMigrationsPath)) {
            mkdir($moduleMigrationsPath, 0777, true);
        }

        // Get the last migration's timestamp
        $files = glob($moduleMigrationsPath . '/*.php');
        natsort($files); // Natural sort to ensure correct order
        $lastMigration = end($files);

        if ($lastMigration) {
            preg_match('/(\d{4}_\d{2}_\d{2}_\d{6})/', $lastMigration, $matches);
            $lastTimestamp = $matches[1] ?? null;

            if ($lastTimestamp) {
                $newTimestamp = date('Y_m_d_His', strtotime('+1 second', strtotime(str_replace('_', '-', $lastTimestamp))));
            } else {
                $newTimestamp = date('Y_m_d_His');
            }
        } else {
            $newTimestamp = date('Y_m_d_His');
        }

        $migrationFileName = "$newTimestamp" . "_$migrationName.php";

        // Use the Artisan command to generate the migration
        $this->call('make:migration', [
            'name' => $migrationName,
            '--path' => $relativePath
        ]);

        $this->info("Migration created: $migrationFileName in module: $moduleName");
    }
}
