<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:module {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations for a specific module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $module = $this->argument('module');

        $relativePath = "app/Modules/$module/database/migrations";
        $moduleMigrationsPath = base_path($relativePath);

        // Ensure the directory exists
        if (!is_dir($moduleMigrationsPath)) {
            $this->error("The module $module does not exist or does not have a migrations directory.");
            return;
        }

        $this->call('migrate', [
            '--path' => $moduleMigrationsPath
        ]);

        $this->info("Migrations ran for module: $module");    }
}
