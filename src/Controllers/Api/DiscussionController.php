<?php

namespace Bitporch\Firefly\Controllers\Api;

use Bitporch\Firefly\Controllers\Controller;
use Bitporch\Firefly\Models\Discussion;
use Bitporch\Firefly\Requests\Discussions\CreateDiscussionRequest;
use Bitporch\Firefly\Requests\Discussions\UpdateDiscussionRequest;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Discussion::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateDiscussionRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        $discussion = Discussion::create($request->all());

        return response($discussion, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Discussion $discussion
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        $discussion->posts = $discussion->posts()
            ->paginate(config('firefly.pagination.posts'));

        return response($discussion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDiscussionRequest $request
     * @param Discussion              $discussion
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscussionRequest $request, Discussion $discussion)
    {
        $discussion->update($request->all());

        return response($discussion, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Discussion $discussion
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        $discussion->delete();

        return response($discussion, 204);
    }
}
