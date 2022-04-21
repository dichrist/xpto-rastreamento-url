<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['link'];
    protected $guarded = ['content_body', 'status_code'];

    public $timestamps = true;

    public static function getDataUrl(string $url)
    {   
        $curl = curl_init();

        $curl_options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30
        );

        curl_setopt_array($curl, $curl_options);

        $response = curl_exec($curl);

        if (!$response){
            $status_code_url = null; 
            $content_body_url = null;
        } else {
            $info = curl_getinfo($curl);

            $status_code_url = $info['http_code'];

            $content_body_url = in_array($status_code_url, range(1,399)) 
                                ? $content_body_url = htmlspecialchars($response) 
                                : "<p class='text-center'>Conteudo da pagina nao disponivel</p>";
        }

        curl_close($curl);

        return array(
            'status' => $status_code_url,
            'content' => $content_body_url
        );
    }
}