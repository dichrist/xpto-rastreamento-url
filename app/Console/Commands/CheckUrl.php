<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Url;
use Illuminate\Support\Facades\DB;

class CheckUrl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:url';

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
        $urls = Url::all();

        foreach($urls as $url) {
            $responseUrl = Url::getDataUrl($url->link);
        
            DB::table('urls')
                ->where('id', $url->id)
                ->update([
                    'status_code' => $responseUrl['status'],
                    'content_body' => $responseUrl['content'],
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
        }
    }
}
