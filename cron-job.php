<?php 

use App\Models\Url;
use Illuminate\Support\Facades\DB;

DB::table('urls')->insert([
    'link' => 'https://example.com'
]);

/*$urls = Url::all();

foreach($urls as $url) {
    $responseUrl = Url::getDataUrl($url->link);

    DB::table('urls')
        ->where('id', $url->id)
        ->update([
            'status_code' => $responseUrl['status'],
            'content_body' => $responseUrl['content'],
            'updated_at' => date("Y-m-d H:i:s")
        ]);
}*/

