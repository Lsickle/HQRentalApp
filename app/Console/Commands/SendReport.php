<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Notification;
use App\Notifications\HourlyReport;
use App\Data;
use App\User;



class SendReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendReport
                        {user : The ID of the user}
                        {--queue= : Whether the job should be queued}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command for report hourly how many items has been created';

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
        $userId = $this->argument('user');

        $count = Data::where('created_at', '>=', \Carbon\Carbon::now()->subHour())->count('id');
        $user = User::findOrFail($userId);
        $details = [
            'greeting' => 'Hi '.$user->name,
            'body' => 'in the last hour has been created '.$count.' Items Successfully',
            'thanks' => 'Thank you for using HQRentalApp!',
            'actionText' => 'View Items',
            'actionURL' => url('/data')
        ];
        Notification::send($user, new HourlyReport($details));
    }
}
