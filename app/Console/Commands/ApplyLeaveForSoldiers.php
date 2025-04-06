<?php

namespace App\Console\Commands;

use App\Models\Soldier;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ApplyLeaveForSoldiers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:apply-leave-for-soldiers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $soldiers = Soldier::where('work_days', '>=', 20)
        ->where('status', false)
        ->get();

foreach ($soldiers as $soldier) {
$soldier->status = true;
$soldier->leave_start_date = Carbon::now();
$soldier->leave_end_date = Carbon::now()->addDays(9);
$soldier->save();

$this->info("تم تطبيق إجازة 9 أيام على الجندي ID: {$soldier->id}");
}
return 0;
}
    
}
