<?php

namespace Root\GenerateModule\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class GenerateModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gen:module 
    { table_name : Database table name }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Module Package';

    protected $tableName;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->tableName = $this->argument('table_name');

        try {
            $this->info("Checking if Table " . $this->tableName . " exists");

            if (!Schema::hasTable($this->tableName)) {
                return $this->error("Table " . $this->tableName . " does not exist");
            }
            // Artisan::call('db:migrate', ['argument-name-as-defined-in-signature-property-of-command' => 'mymigration', '--table' => 'mytable']);
        } catch (\Throwable $e) {
            $this->error($e->getMessage());
        }
    }
}
