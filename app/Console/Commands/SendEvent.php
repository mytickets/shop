<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:event';

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
     * @return mixed
     */
    public function handle()
    {
        event(             new \App\Events\ServerCreated("Новый заказ ", 1)        );
        // broadcast(             new \App\Events\ServerCreated("event")        );

        // Notification::send($users, new TestNote());
        //
    }
}
