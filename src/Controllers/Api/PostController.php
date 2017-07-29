<?php

namespace Bitporch\Firefly\Controllers\Api;

use Bitporch\Firefly\Controllers\Controller;
use Bitporch\Firefly\Models\Post;
use Bitporch\Firefly\Requests\Posts\CreatePostRequest;
use Bitporch\Firefly\Requests\Posts\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = Post::create($request->all());

        return response($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param int               $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());

        return response($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response($post, 204);
    }
}
