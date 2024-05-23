<?php

namespace App\Console\Commands;

use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateTicketStatus extends Command
{
    protected $signature = 'tiket:update-status';

    protected $description = 'Update tiket status automatically';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $tikets = Tiket::where('batas_waktu', '<=', Carbon::now())->get();

        foreach ($tikets as $tiket) {
            $tiket->status_tiket = 0;
            $tiket->save();
        }

        $this->info('tiket statuses updated successfully.');
    }
}
