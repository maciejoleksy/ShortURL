<?php

namespace App\Http\Controllers;

use App\Models\Models\UrlShort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UrlController extends Controller
{
    public function index()
    {
        return view('url.short');
    }

    public function short(Request $request)
    {
        $longUrl = $request->input('longUrl');
        $shortUrl = $request->input('shortUrl');

        $url = UrlShort::where('url', $longUrl)->firstOr(function () use ($longUrl, $shortUrl){
            return UrlShort::create([
                'url'   => $longUrl,
                'short' => isset($shortUrl) ? $shortUrl : $this->generateShortUrl(),
            ]);
        });

        return view('url.shorturl', [
            'url' => $url
        ]);
    }

    public function generateShortUrl()
    {
        $result = base_convert(rand(1000, 99999), 10, 36);
        $data   = UrlShort::whereShort($result)->first();

        if ($data != null) {
            $this->generateShortUrl();
        }

        return $result;
    }

    public function shortLink($link)
    {
        $url = UrlShort::where('short', $link)->first();

        return redirect($url->url);
    }
}
