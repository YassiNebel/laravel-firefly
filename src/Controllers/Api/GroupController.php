<?php

namespace Bitporch\Firefly\Controllers\Api;

use Bitporch\Firefly\Controllers\Controller;
use Bitporch\Firefly\Models\Group;
use Bitporch\Firefly\Requests\Groups\CreateGroupRequest;
use Bitporch\Firefly\Requests\Groups\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Group::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Bitporch\Forum\Requests\Groups\CreateGroupRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGroupRequest $request)
    {
        $group = Group::create($request->all());

        return response($group, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Group $group
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $group->discussions = $group->discussions()
            ->paginate(config('firefly.pagination.discussions'));

        return response($group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGroupRequest $request
     * @param Group              $group
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->all());

        return response($group, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return response($group, 204);
    }
}
