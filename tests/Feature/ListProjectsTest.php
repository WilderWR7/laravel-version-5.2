<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PhpParser\Node\Expr\FuncCall;
use Tests\TestCase;

class ListProjectsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->withoutExceptionHandling();
        $project =Project::factory()->create();
        // dd($project->toArray());

        $response = $this->get(route('project.index'));
        $response->assertStatus(200);
        $response->assertViewIs('portafolio.index'); //devuelve la vista x?
        $response->assertViewHas('proyects'); //verifica si existe la variable x
        // $response->assertViewHas('newProject'); //verifica si existe la variable x
        $response->assertViewHas('deletedProjects'); //verifica si existe la variable x
        $response->assertSee($project->title);
    }
    public function test_can_see_all_projects() {
        $project =Project::factory()->create();
        $project2 =Project::factory()->create();
        // $project2 =Project::factory()->make(); //create array of Project
        // dd($project->toArray());
        // $project = Project::create([
        //     'title'=>'Mi nuevo proyecto',
        //     'url'=>'mi-nuevo-proyecto2',
        //     'description'=>'Descripcion de mi nuevo proyecto',
        //     'image'=>'not found',
        // ]);

        // $project2 = Project::create([
        //     'title'=>'Mi nuevo proyecto 2',
        //     'url'=>'mi-nuevo-proyecto-2',
        //     'description'=>'Descripcion de mi nuevo proyecto',
        //     'image'=>'not found',
        // ]);

        $response = $this->get(route('project.show',$project));
        $response->assertStatus(200);
        $response->assertViewHas('project');
        $response->assertSee($project->title);
        $response->assertDontSee($project2->title);

    }



}
