<?php

namespace App\Http\Controllers;

use App\Events\ProjectSaved;
use App\Http\Requests\SaveProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Repositories\CategoryRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    protected $projectRepository, $categoryRepository;
    protected $view;
    public function __construct(ProjectRepository $projectRepository, CategoryRepository $categoryRepository, \Illuminate\Contracts\View\Factory $view)
    {
        $this->projectRepository = $projectRepository;
        $this->categoryRepository = $categoryRepository;
        $this->view = $view;
        // $this->middleware('auth')->except(['index','show']);  //agrega el middleware menos a: index y show
        // $this->middleware('example')->only(['restore']); //agrega el middleware a: restore
    }

    public function index()
    {

        // $portafolio = DB::table('proyects')->get();
        // $portafolio = Proyect::get();
        // $portafolio = Proyect::latest('created_at')->get();
        // $proyects = Project::with('category')->latest()->paginate(3);
        // return Project::withTrashed()->with('category')->latest()->paginate();  //incluye los datos que intentaron ser eliminados
        // return $proyects;
        // return view('portafolio.index', compact('proyects'));

        $proyects = $this->projectRepository->getPaginatedProjects();
        $onlyTrashed = $this->projectRepository->onlyTrashed();
        // return $proyects;
        return $this->view->make('portafolio.index', [
            'proyects' => $proyects,
            // 'newProject'=> new Project(),
            'deletedProjects' => $onlyTrashed,
        ]);
    }
    public function create()
    {
        Gate::allows('create-projects'); //boolean
        // abort_unless($this->allows('create-projects'),403);
        // $this->authorize('create', $project = new Project);
        $project = $this->projectRepository->getNewProject();
        return $this->view->make('portafolio.create', [
            'project' => $project,
            'categories' => $this->categoryRepository->pluckIdName(),
        ]);
    }
    // public function show(string $id) {
    //     return view('portafolio.show',['proyect'=> Proyect::findOrFail($id)]);
    // }
    public function show(Project $project)
    {
        // return $project;
        return $this->view->make('portafolio.show', ['project' => $project]);
        // return  Project::findOrFail($url);
    }
    public function store(SaveProjectRequest $request)
    {
        // $fields = request()->validate([
        //     "title"=> "required",
        //     "url"=> ["required","min:3"],
        //     "description"=> ["required","min:5"],
        // ]);
        // return 'Hello desde Store';
        // abort_unless(Gate::allows('create-projects'),403); GETE
        // $this->authorize('create', $project);
        $project = $this->projectRepository->createProject($request);
        $project->image = $request->file('image')->store('images', 'public'); //utiliza el disco public
        $project->save();
        Gate::allows('create-projects'); //boolean

        ProjectSaved::dispatch($project);

        // return redirect()->route('project.index');
        return back()->with('status', 'Proyecto fue creado correctamente');
    }

    public function edit(Project $project)
    {
        // return Category::get(); //getAll();
        // return Category::pluck('nombre','id'); //obtiene solo nombres mediante el key: ID
        $this->authorize('update', $project);
        return view('portafolio.edit', [
            'project' => $project,
            'categories' => Category::pluck('nombre', 'id'),
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        // return $request;
        $this->authorize('update', $project);

        if ($request->hasFile('image')) {
            if ($project->image) {
                unlink(storage_path('app/public/' . $project->image));
            }
            $project->fill($request->validated());
            $project->image = $request->file('image')->store('images', 'public');
            $project->save();
            ProjectSaved::dispatch($project);

        } else {
            $project->update(array_filter($request->validated()));
        }
        return redirect()->route('project.show', $project)->with('status', 'Proyecto actualizado correctamente');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        // unlink(storage_path('app/public/'.$project->image));
        $project->delete();
        return redirect()->route('project.index')->with('status', 'Proyecto eliminado correctamente.');
    }

    public function forceDelete($projectUrl)
    {
        $project = Project::withTrashed()->where("url", $projectUrl)->firstOrFail();
        $this->authorize('forceDelete', $project);
        unlink(storage_path('app/public/' . $project->image));
        $project->forceDelete();
        return redirect()->route('project.index')->with('status', 'Proyecto eliminado permanentemente.');
    }

    public function restore($projectUrl)
    {
        $project = Project::withTrashed()->where("url", $projectUrl)->firstOrFail();
        // \Log::info($project);
        // return $project;
        $this->authorize('restore', $project);
        $project->restore();
        return redirect()->route('project.index')->with('status', 'El proyecto fue restaurado con exito.');

    }
    public function nuevo(Project $project)
    {
        return $project;
    }

}
