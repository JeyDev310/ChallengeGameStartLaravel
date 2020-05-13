<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:game';

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
        //
        $teamA = $this->ask('Enter A Teams players:');
        $teamB = $this->ask('Enter B Teams players:');
        $teamAPlayers = explode(',', $teamA);
        $teamBPlayers = explode(',', $teamB);
        sort($teamAPlayers);
        sort($teamBPlayers);
        if (count($teamAPlayers) == 5 && count($teamBPlayers) == 5) {
            $result = "Win";
            for ($index = 0; $index < 5; $index++) {
                if ((int) $teamAPlayers[$index] < (int) $teamBPlayers[$index]) {
                    $result = "Lose";
                    break;
                }
            }
            $this->info($result);
        } else {
            $this->info("Wrong Input...");
        }
    }
}
