<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\User;
class AddVacationDays extends Command
{




    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'vacation:add';
    protected $description = 'Automatically add 1.5 vacation days every 30 days if the user balance is negative';



    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        $users = User::all();

        foreach ($users as $user) {
            // Get the number of non-work days since the last vacation day
            $lastVacationDay = $user->last_vacation_day;
            $today = Carbon::now();
            $nonWorkDays = $this->countNonWorkDays($lastVacationDay, $today);

            // Add 1.5 days for each non-work day
            $newBalance = $user->solde + (1.5 * $nonWorkDays);

            // If the new balance is still negative after adding the days, add 1.5 days
            if ($newBalance < 0) {
                $user->solde += 1.5;
                $user->last_vacation_day = $today;
                $user->save();
            }
        }

        $this->info('Vacation days added successfully.');
    }


     // Helper function to count non-work days between two dates
     private function countNonWorkDays($startDate, $endDate)
     {
         // Your implementation of counting non-work days
     }


}
