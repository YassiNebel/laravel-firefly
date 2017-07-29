<?php

namespace Bitporch\Firefly\Controllers;

use Bitporch\Firefly\Models\Discussion;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discussions = Discussion::orderBy([
            'created_at'  => 'desc',
            'stickied_at' => 'desc',
        ])->paginate(config('firefly.pagination.discussions'));

        return view('firefly::index')->with(compact('discussions'));
    }

    /**
     * Display a listing of the queried resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $discussions = Discussion::where('title', 'like', '%'.$request->get('query').'%')
            ->orderBy('created_at', 'desc')
            ->paginate(config('firefly.pagination.discussions'));

        return view('firefly::search-results')->with(compact('discussions'));
    }
}
