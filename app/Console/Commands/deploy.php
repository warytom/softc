<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class deploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Artisan::call('migrate');
        Artisan::call('db:seed --class=AdminUserSeeder');
        Artisan::call('optimize');
        Artisan::call('view:cache');
        Artisan::call('view:clear');
        Artisan::call('key:generate');
        Artisan::call('storage:link');


        $this->info('Deploy is successfully');
        $this->info('Login_1: email:admin_1@admin.com password:password');
        $this->info('Login_2: email:admin_2@admin.com password:password');

    }
}
