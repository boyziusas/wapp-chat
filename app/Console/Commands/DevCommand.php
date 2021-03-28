<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Str;

use App\Services\ChatApi\DialogService;
use App\Services\ChatApi\MessageService;

/**
 * Class DevCommand
 *
 * @package App\Console\Commands
 */
class DevCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $dialogService;

    private $messageService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct (DialogService $dialogService, MessageService $messageService) {
        $this->dialogService = $dialogService;
        $this->messageService = $messageService;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle () {
        $dialogues = $this->dialogService->all();

        $target = '+380502226121';

        $dialogId = null;

        foreach ($dialogues as $dialog) {
            $name = str_replace(' ', '', $dialog['name']);

            if ($name === $target) {
                $dialogId = $dialog['id'];
                break;
            }
        }

        $this->dialogService->get($dialogId);
    }
}
