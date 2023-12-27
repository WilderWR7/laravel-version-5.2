<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Collection;

use Illuminate\Database\Schema\IndexDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectsRestart extends Controller
{
    public function index(Request $request) {
        // $project =  DB::table('projects')->where('title','Laravel Web')->first();
        // $project =  DB::table('projects')->value('title');
        $project =  DB::table('projects')->find(2); //search id:2

        DB::table('users')->where('role', 'user')
        ->chunkById(5,function (Collection $users ){
            foreach ($users as $user) {
                DB::table('users')->where('id',$user->id)
                ->update(['role'=>'admin']);
            }
            return false;
        });

        // $project =  DB::table('projects')->pluck('title','Laravel Web'); //get column title:Laravel Web
        return response()->json(['title'=> $project]);


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
