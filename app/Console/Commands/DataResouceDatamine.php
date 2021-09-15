<?php

namespace App\Console\Commands;

use App\Models\DataResource;
use Illuminate\Console\Command;

class DataResouceDatamine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:data_mine';

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
     * @return int
     */
    public function handle()
    {


        $test = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'javelindata_itemdefinitions_master.loc.xml');

        $new = simplexml_load_string($test);

        $data_mine = [];

        foreach ($new->children() as $item) {
            $data_mine[] = [
                'key' => (string) $item['key'],
                'name' => $item->__toString() ?: null
            ];
        }

        $bar = $this->output->createProgressBar(count($data_mine));

        $bar->start();

        foreach ($data_mine as $data) {
            if ($data['name'] !== null) {
                DataResource::updateOrCreate([
                    'key' => $data['key']
                ],[
                    'name' => $data['name']
                ]);
            }
            $bar->advance();
        }

        $bar->finish();
    }
}
