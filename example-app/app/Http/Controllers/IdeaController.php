<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function store(){

        request()->validate([
            'idea' => 'required|min:5|max:240'
        ]);
        
        $idea = Idea::create([
            'content'=>request()->get('idea'),
        ]);
        return redirect()->route('homepage')->with('success','Idea created successfully.');
        
    }

    public function destroy($id){
        $idea = Idea::where('id',$id)->firstOrFail();
        $idea->delete();

        return redirect()->route('homepage')->with('success','Idea deleted successfully.');

    }

    public function show(Idea $idea){
        return view ('ideas.show',['idea'=>$idea]);
    }
}
