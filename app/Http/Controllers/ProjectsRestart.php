<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Database\Schema\IndexDefinition;
use Illuminate\Http\Request;

class ProjectsRestart extends Controller
{
    public function index(Request $request) {
        return 1;
    }

    public function edit($projectUrl) {
        // return $projectUrl;
        $project = Project::withTrashed()->where("url", $projectUrl)->firstOrFail();
        $this->authorize('restore',$project);
        $project->restore();
        return redirect()->route('project.index')->with('status', 'El proyecto fue restaurado con exito.');
        // return $project;
    }
    public function destroy($projectUrl) {
        $project = Project::withTrashed()->where("url", $projectUrl)->firstOrFail();
        $this->authorize('forceDelete',$project);
        unlink(storage_path('app/public/'.$project->image));
        $project->forceDelete();
        return redirect()->route('project.index')->with('status', 'Proyecto eliminado permanentemente.');
    }
}
