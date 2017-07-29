<?php

namespace Bitporch\Firefly\Controllers;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('firefly::groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateGroupRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGroupRequest $request)
    {
        $group = Group::create($request->all());

        return redirect()->route('firefly::groups.show', $group->id);
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
            ->orderBy'created_at', 'desc')
            ->orderBy('stickied_at', 'desc')
            ->paginate(config('firefly.pagination.discussions'));

        return view('firefly::groups.show')->with(compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('firefly::groups.edit')->with(compact('group'));
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

        return view('firefly::groups.show')->with(compact('group'));
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
