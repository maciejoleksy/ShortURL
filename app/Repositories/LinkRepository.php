<?php

namespace App\Repositories;

use App\Contracts\Repositories\LinkRepositoryInterface;
use App\Models\Link;
use Illuminate\Support\Str;

class LinkRepository implements LinkRepositoryInterface
{
    public function store(array $data)
    {
        return Link::create([
            'link'       => $data['link'],
            'short_name' => isset($data['shortName']) ? $data['shortName'] : $this->generateShortName(),
        ]);
    }

    public function getLinkByShortName(string $shortName)
    {
        $link = Link::where('short_name', $shortName)->firstOrFail();

        if (!preg_match("~^(?:f|ht)tps?://~i", $link->link)) {
            return $link = "http://" . $link->link;
        }

        return $link->link;
    }

    public function generateShortName()
    {
        $shortName = strtolower(Str::random(6));
        if (Link::where('short_name', $shortName)->first() === null) {
            return $shortName;
        }

        return $this->generateShortName();
    }
}
