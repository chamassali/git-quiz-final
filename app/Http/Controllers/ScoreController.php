<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Question;
use Illuminate\Http\Request;

use App\Http\Requests\StoreScoreRequest;
use App\Http\Requests\UpdateScoreRequest;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = Score::all();
        return response()->json($scores);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addScore(Request $request)
    {
        $user = auth()->user();
        $FinalScore = 0;
        $answers = $request["answers"];
        foreach ($answers as $answer){
            $question = Question::find($answer["question_id"]);
            if($question->answer === $answer['answer']) {
                $FinalScore += $question->earnings;
            }
        }


        $score = new Score();
        $score["user_id"] = $user["id"];
        $score["quiz_id"] = $request["quiz_id"];
        $score["score"] = $FinalScore;
        $score->save();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScoreRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $score = Score::find($id);
        return response()->json($score);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScoreRequest  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScoreRequest $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
