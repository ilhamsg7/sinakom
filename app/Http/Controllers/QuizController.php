<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('quizzes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $quiz = $request->validate([
            'modul_id' => 'required|exists:moduls,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quiz_path' => 'required',
            'desc' => 'required|string',
            'status' => 'required|in:dibuka,draft,ditutup',
            'finished_at' => 'nullable|date',
            'started_at' => 'nullable|date',
        ]);
        Quiz::create($quiz);
        return redirect()->route('quizzes')->with('success', 'Quiz berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz) {
        $quiz = Quiz::where('path', $quiz->quiz_path)->first();
        return view('quizzes.show', [
            'quiz' => $quiz,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz) {
         $quiz = Quiz::where('path', $quiz->quiz_path)->first();
        return view('quizzes.edit', [
            'quiz' => $quiz,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz) {
        $quiz = Quiz::where('path', $quiz->quiz_path)->first();
        $quiz->update($request->validate([
            'modul_id' => 'required|exists:moduls,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quiz_path' => 'required',
            'desc' => 'required|string',
            'status' => 'required|in:dibuka,draft,ditutup',
            'finished_at' => 'nullable|date',
            'started_at' => 'nullable|date',
        ]));
        return redirect()->route('quizzes')->with('success', 'Quiz berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz) {
        Quiz::destroy($quiz->quiz_path);
        return redirect()->route('quizzes')->with('success', 'Quiz berhasil dihapus');
    }
}
