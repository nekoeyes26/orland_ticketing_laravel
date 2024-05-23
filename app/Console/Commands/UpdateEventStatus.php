<?php

namespace App\Console\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateEventStatus extends Command
{
    protected $signature = 'event:update-status';

    protected $description = 'Update event status automatically';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $events = Event::where('waktu_event', '<=', Carbon::now())->get();

        foreach ($events as $event) {
            $event->status_event = 1;
            $event->save();
        }

        $this->info('Event statuses updated successfully.');
    }
}
