<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('membership.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('membership.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required',
            'course_list_id' => 'required',
        ]);

        Membership::create($validated);

        return redirect('/membership')->with('success', 'Membership created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $member) {
        return view('membership.show', [
            'member' => $member
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $member){
        return view('membership.edit', [
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $member){
        $rules = [
            'user_id' => 'required',
            'course_list_id' => 'required',
        ];

        $validated = $member->update($rules);
        Membership::where('id', $member->id)->update($validated);
        return redirect('/membership')->with('success', 'Membership updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $member){
        Membership::destroy($member->id);
        return redirect('/membership')->with('success', 'Membership deleted successfully');
    }
}
