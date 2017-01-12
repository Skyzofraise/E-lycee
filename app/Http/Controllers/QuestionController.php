<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Choice;
use Auth;

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
        $this->validate($request, [
            'title' => 'required|unique:questions',
            'class_level' => 'in:first_class,final_class',
            'user_id' => 'integer',
            'content' => 'required',
            'status' => 'in:published,unpublished',
        ]);
        $question = Question::create($request->all());
        $question->user_id = Auth::user()->id;
        $question->touch();
        
        for ($i = 0; $i < $request->get('numberChoice'); $i++){
            Choice::create([
                'question_id' => $question->id,
                'content' => '',
                'status' => 'no',
            ]);
        }
        
        return redirect()
                ->action('QuestionController@EditChoice', $question)
                ->with('messages', 'Question créée avec succès');
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
        
         return redirect()
                ->action('QuestionController@EditChoice', $question)
                ->with('messages', 'La question a bien été modifiée');
    }
    
    public function ChoiceUpdate(Request $request)
    {
	    if ($request->get('id')) 
        {
		    if (empty($request->get('content')[0]) || empty($request->get('content')[1])) 
		    {
		    	return back()->with('message', 'Vous devez indiquer au moins deux réponses possibles');
		    }

            $check = 0;
            for ($i = 0; $i < count($request->get('status')); $i++){
                if (!empty($request->get('status')[$i]) )  
                    $check++;
            }
            if($check == 0)
                return back()->with('erreur', 'Vous devez cocher au moins une bonne réponse');

		    foreach ($request->get('id') as $key => $id) 
		    {
			    $choice = Choice::findOrFail($request->get('id')[$key]);
			    $choice->content = $request->get('content')[$key];

		    	if($request->get('status')[$key]){
		    		$choice->status = 'yes';
		    	} else {
		    		$choice->status = 'no';
		    	}
		    	
			    $choice->touch();

			    if (!$choice->content) $choice->delete();
		    }

	    	return redirect()
                    ->action('QuestionController@index')
                    ->with('message', 'Question enregistrée avec succès !');
	    }
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
        
        return back()->with('message', 'Cette question a bien été supprimée');
    }

}