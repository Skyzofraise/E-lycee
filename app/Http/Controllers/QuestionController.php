<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Choice;

class QuestionController extends Controller
{
    //
    public function index()
    {
        $questions = Question::all();
        
        return view('back.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Question::create($request->all());
        
        for ($i = 0; $i < $request->get('numberChoice'); $i++){
            
            Choice::create([
                'question_id' => $question->id,
                'content' => '',
            ]);
        }
        
        return redirect()->action('QuestionController@EditChoice', $question)->with('messages', 'Question crée avec succès');
    }
    
    public function EditChoice($id)
    {
        $question = Question::findOrFail($id);
        return view('back.choices.edit', compact('question'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $question = Question::findOrFail($id);
        
        return view('back.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());
        
         return redirect()->action('QuestionController@ChoiceEdit', $question)->with('messages', 'Question modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        
        return back()->with('message', 'Question supprimée avec succès');
    }
    
    public function ChoiceUpdate(Request $request)
    {
	    if ($request->get('id')) {
	    if ($request->get('content')[0] == '' || $request->get('content')[1] == '')
	    return back()->with('message', 'Erreur, les 2 premiers choix sont obligatoires.');

	    foreach ($request->get('id') as $key => $id) {
	    $choice = Choice::findOrFail($request->get('id')[$key]);
	    $choice->content = $request->get('content')[$key];
	    $choice->status = $request->get('status')[$key];
	    $choice->touch();

	    if (!$choice->content) $choice->delete();
    }

    return redirect()->action('QuestionController@index')->with('message', 'Question modifiée avec succès !');
    }
    }
}
