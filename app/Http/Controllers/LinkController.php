<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\LinkRepositoryInterface;
use App\Http\Requests\StoreRequest;

class LinkController extends Controller
{
    private $linkRepository;

    public function __construct(
        LinkRepositoryInterface $linkRepository
    ) {
        $this->linkRepository = $linkRepository;
    }

    public function index()
    {
        return view('url.short');
    }

    public function store(StoreRequest $request)
    {
        $link = $this->linkRepository->store(
            $request->only(
                'longUrl',
                'shortUrl'
            )
        );

        return view('url.shorturl', [
            'link' => $link,
        ]);
    }

    public function getLinkByShortName(string $shortName)
    {
        $longLink = $this->linkRepository->getLinkByShortName($shortName);

        return redirect($longLink);
    }
}
