<?php

namespace App\Console\Commands;

use App\Events\ChatEvent;
use App\Events\ChatEventObject;
use Illuminate\Console\Command;

class SendMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ChatEvent::dispatch(new ChatEventObject("me","hello world!"));

        return Command::SUCCESS;
    }
}
