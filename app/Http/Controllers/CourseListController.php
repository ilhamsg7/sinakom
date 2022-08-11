<?php

namespace App\Http\Controllers;

use App\Models\CourseList;
use Illuminate\Http\Request;
use App\Http\Requests\CourseListRequest;

class CourseListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('course-list.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('course-list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseListRequest $request) {
        $validated = $request->validated();
        CourseList::create($validated);
        return redirect('/course-list')->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CourseList $list) {
        return view('course-list.show', [
            'list' => $list
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseList $list) {
        return view('course-list.edit', [
            'list' => $list
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseListRequest $request, CourseList $list) {
        $validated = $request->validated();
        CourseList::where('id', $list->id)->update($validated);
        return redirect('/course-list')->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseList $list) {
        CourseList::destroy($list->id);
        return redirect('/course-list')->with('success', 'Course deleted successfully');
    }
}
