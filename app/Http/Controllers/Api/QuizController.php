<?php

namespace App\Http\Controllers\Api;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Score;
use App\Models\Choice;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return $quizzes;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show($quizId)
    {
        $quizz = Quiz::find($quizId);
        return $quizz;
    }
    /**
     * Show the form for delete a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        Quiz::find($id)->delete();
    }


    
    /**
     * Publish the quizz by modifying the data in db.
     *
     * @return \Illuminate\Http\Response
     */
    public function publish($quizzId)
    {
        $findQuizz = Quiz::find($quizzId);
        $findQuizz->update(array('published' => 1));
        return('Quizz is now published');
    }    



    /**
     * Unpublish the quizz by modifying the data in db.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpublish($quizzId)
    {
        $findQuizz = Quiz::find($quizzId);
        $findQuizz->update(array('published' => 0));
        return('Quizz is now unpublished');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questions = $request["questions"];
        $data = json_decode($request->getContent());
        $quiz = new Quiz();
        $quiz->label = $data->label;
        $quiz->save();
        foreach ($questions as $question) {
            $Question = new Question();
            $Question["quiz_id"] = $quiz->id;
            $Question["label"] = $question["label"];
            $Question["answer"] = null;
            $Question["earnings"] = $question["earnings"];
            $Question->save();
            foreach ($question["choices"] as $choice){
                $Choice = new Choice();
                $Choice["question_id"] = $Question["id"];
                $Choice["label"] = $choice["label"];
                $Choice->save();
                if ($choice['id'] == $question["answer"]) {
                    $Question["answer"] = $Choice["id"];
                    $Question->save();
                }
            }
            $Question->save();
        }
    }



  /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, int $id)
    {
        $quiz = Quiz::find($id);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $quiz = Quiz::find($id);
        $questions = Question::where("quiz_id", $id)->get();
        foreach ($questions as $question){
            Choice::where("question_id", $question["id"])->delete();
        }
        Question::where("quiz_id", $id)->delete();
        Score::where("quiz_id", $id)->delete();
        $quiz->delete();

        return $this->store($request);
    }



    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser($userId) {
        $current = User::find($userId);
        return $current;
    }
}
