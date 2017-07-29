<?php

namespace Bitporch\Firefly\Controllers;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('firefly::discussions.create');
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
        $discussion = $request->user()
            ->discussions()
            ->create($request->only('title'));

        $discussion->posts()->create([
            'discussion_id' => $discussion->id,
            'user_id'       => $request->user()->id,
            'content'       => $request->content,
        ]);

        $discussion->groups()->attach($request->group_id);

        return redirect()->route('firefly.discussions.show', $discussion->slug);
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
        $discussion->posts = $discussion->posts()->paginate(config('firefly.pagination.posts'));

        return view('firefly::discussions.show')->with(compact('discussion'));
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

        return redirect()->route('firefly.discussions.show', $discussion->slug);
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

        return redirect()->route('firefly.home')->with('success', 'Discussion deleted successfully.');
    }
}
