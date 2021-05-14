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

    public function create()
    {
        return view('link.create');
    }

    public function store(StoreRequest $request)
    {
        $link = $this->linkRepository->store(
            $request->only(
                'link',
                'shortName'
            )
        );

        return view('link.show', [
            'link' => $link,
        ]);
    }

    public function getLinkByShortName(string $shortName)
    {
        $longLink = $this->linkRepository->getLinkByShortName($shortName);

        return redirect($longLink);
    }
}
