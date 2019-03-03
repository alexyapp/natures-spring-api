<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;
use App\Models\IslandGroup;
use App\Models\Province;
use App\Models\City;

class GenerateSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix missing slugs';

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
        $island_groups = IslandGroup::all();
        $provinces = Province::all();
        $cities = City::all();

        $output = new ConsoleOutput();
        error_log('Fixing missing slugs for island_groups table');
        $bar = new ProgressBar($output, count($island_groups));

        foreach ($island_groups as $island_group) {
            $bar->advance();
            $island_group->save();
        }

        $bar->finish();
        error_log("\n");

        $output = new ConsoleOutput();
        error_log('Fixing missing slugs for provinces table');
        $bar = new ProgressBar($output, count($provinces));

        foreach ($provinces as $province) {
            $bar->advance();
            $province->save();
        }

        $bar->finish();
        error_log("\n");

        $output = new ConsoleOutput();
        error_log('Fixing missing slugs for cities table');
        $bar = new ProgressBar($output, count($cities));

        foreach ($cities as $city) {
            $bar->advance();
            $city->save();
        }

        $bar->finish();
        error_log("\n");
    }
}
