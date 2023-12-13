<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\DB;

class ProyectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        
        // $portafolio = DB::table('proyects')->get();
        // $portafolio = Proyect::get();
        // $portafolio = Proyect::latest('created_at')->get();
        $proyects = Project::latest()->orderBy('id','ASC')->paginate(10);
        return view('portafolio.index',compact('proyects'));
    }
    public function create() {
        return view('portafolio.create',[
            'project'=> new Project()
        ]);
    }
    // public function show(string $id) {
    //     return view('portafolio.show',['proyect'=> Proyect::findOrFail($id)]);
    // }
    public function show(Project $project) {
        // return $project;
        return view('portafolio.show', ['project'=> $project]);
        // return  Project::findOrFail($url);
    }
    public function store (SaveProjectRequest $request) {
        // $fields = request()->validate([
        //     "title"=> "required",
        //     "url"=> ["required","min:3"],
        //     "description"=> ["required","min:5"],
        // ]);
        // return 'Hello desde Store';
        Project::create( $request->validated() );
        // return redirect()->route('project.index');
        return back()->with('status','Recibimos tu mensaje, te responderemos en menos de 24 horas');
    }

    public function edit(Project $project) {
        return view('portafolio.edit',['project'=>$project]);
    }

    public function update(Project $project,SaveProjectRequest $request) {
        $project->update($request->validated());
        return redirect()->route('project.show',$project)->with('status','Proyecto actualizado correctamente');
    }

    public function destroy (Project $project) {
        $project->delete();
        return redirect()->route('project.index')->with('status','Proyecto eliminado correctamente');
    }
}
