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
        $longUrl = $request->input('url');

        $url = UrlShort::where('url', $longUrl)->firstOr(function () use ($longUrl){
            return UrlShort::create([
                'url'   => $longUrl,
                'short' => $this->generateShortUrl(),
            ]);
        });

        return view('url.shorturl', compact('url'));
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
        $url = UrlShort::whereShort($link)->first();
        return redirect($url->url);
    }
}
