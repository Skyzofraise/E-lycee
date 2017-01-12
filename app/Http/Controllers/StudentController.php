<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

use App\Http\Requests;
use App\Question;
use App\Choice;
use App\Score;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()  
    {   
        $student = Auth::user();
        $class_level = $student->role;

        // Tous les qcm (dans son level)
        $questions = Question::where(['class_level' => $class_level, 'status' => 'published'])->get();

        // Nb total de qcm
        $qcm_count = $questions->count();

        // Nb de qcm non repondu
        $qcm_restant = 0;
        foreach($questions as $question) {
            if(Score::where(['question_id' => $question->id, 'user_id' => Auth::user()->id])->get()->count() === 0)
                $qcm_restant++;
        }

        $number_questions = $qcm_restant;
        
        return view('student.index', compact('questions', 'qcm_restant', 'number_questions', 'qcm_count'));
    }

    public function questions()
    {
        $student = Auth::user();
        $class_level = $student->role;

        $questions_new = Question::with('scores')
                        ->where('class_level', $class_level)
                        ->where('status', 'published')
                        ->whereDoesntHave('scores', function($q) {
                            $q->where('user_id', '=', Auth::user()->id);
                        })
                        ->get();

        $number_questions = Question::with('scores')
        ->where('class_level', $class_level)
        ->where('status', 'published')
        ->whereDoesntHave('scores', function($q) {
            $q->where('user_id', '=', Auth::user()->id);
        })
        ->count();

        $questions_anc = Question::with('scores')
                        ->where('class_level', $class_level)
                        ->where('status', 'published')
                        ->whereHas('scores', function($q) {
                            $q->whereUser_id(Auth::user()->id);
                        })
                        ->get();
        
        return view('student.questions.index', compact('questions_new', 'number_questions' ,'questions_anc'));
    }
    
    public function question($id)
    {
        if(Score::where(['question_id' => $id, 'user_id' => Auth::user()->id])->get()->count() > 0)
            return redirect()->action('StudentController@index');
        
        $question = Question::findOrFail($id);
        $choices = Choice::where('question_id', $question->id)->get();
        
        return view('student.questions.question', compact('question', 'choices'));


    }
    
    public function validation(Request $request, $id)
    {
    	if ($request->get('status')) {
            $note = 1;

            foreach ($request->get('status') as $key => $value) {

                $choice = Choice::findOrFail($key);

                if($request->get('status')[$key] != $choice->status){
                    $note = 0;
                }

            }

            $note = $note == 1 ? 1 : 0;
            $score = Score::firstOrCreate([
                'user_id' => Auth::user()->id,
                'question_id' => $id,
                'note' => $note,
            ]);

            $score->note = $note;
            $score->touch();
         
            return redirect()->action('StudentController@questions');
        }
        return back()->with('erreur', 'Répondez a toutes les questions.');
    }
}