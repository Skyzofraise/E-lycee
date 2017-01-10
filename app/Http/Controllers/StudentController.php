<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Question;
use App\Choice;
use App\Score;

class StudentController extends Controller
{
    
    public function index()  
    {   
        $student = Auth::user();
        $class_level = $student->role;
        $questions = Question::where(['class_level' => $class_level, 'status' => 1])->get();
        $count = 0;
        
        foreach($questions as $question) {
            if(Score::where(['question_id' => $question->id, 'user_id' => Auth::user()->id])->get()->count() === 0)
                $count++;
        }
        
        return view('student.index', compact('questions', 'count'));
    }
    
    public function question($id)
    {
        if(Score::where(['question_id' => $id, 'user_id' => Auth::user()->id])->get()->count() > 0)
            return redirect()->action('StudentController@index');
        
        $question = Question::findOrFail($id);
        $choices = Choice::where('question_id', $question->id)->get();
        
        return view('student.question', compact('question', 'choices'));
    }
    
    public function validChoice(Request $request, $id)
    {
    	if ($request->get('id')) {
            $note = 0;
            $success = [];
            $checked = [];
        
            foreach ($request->get('id') as $key => $id) {
                if (isset($request->get('id')[$key]) && isset($request->get('status')[$key])) {
                    $checked[$key] = $request->get('status')[$key];
                    $choice = Choice::findOrFail($request->get('id')[$key]);
                    if ($choice->status == $request->get('status')[$key]) {
                        $note++;
                        $success[$key] = 1;
                    } else {
                        $note--;
                        $success[$key] = 0;
                    }
                }
            }
            $note = $note > 0 ? $note : 0;
            $max = count($request->get('id'));
            $score = Score::firstOrCreate([
                'user_id' => Auth::user()->id,
                'question_id' => $request->get('question_id'),
            ]);
         
            $score->note = $note;
            $score->touch();
         
            return redirect()->action('StudentController@index');
        }
        
    }
}
