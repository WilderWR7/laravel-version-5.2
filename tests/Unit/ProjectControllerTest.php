<?php

namespace Tests\Feature\Unit;

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use App\Policies\ProjectPolicy;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
// use Tests\TestCase;
use Mockery;

class ProjectControllerTest extends TestCase
{
    // use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
    }
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
         // Mock Project model
         // $projects = $this->getProjects();
        $repository = Mockery::mock(ProjectRepository::class);
        $repository->shouldReceive('getPaginatedProjects')
            ->withAnyArgs()
            ->once()->andReturn('paginatedProjects');
        $repository->shouldReceive('onlyTrashed')->once()->andReturn('recycledProjects');
            // ->andReturn($projects);
        $view = Mockery::mock('Illuminate\View\Factory');
        $controller = new ProjectController($repository,$view);
        $view->shouldReceive('make')
        ->with('portafolio.index',['proyects'=> 'paginatedProjects','deletedProjects'=> 'recycledProjects'])
        ->once();

        // $response = $this->get(view('project.index'));
        $controller->index();
        $this->assertTrue(true);



        // dd($projects);
        // $projectControllerMock  = Mockery::mock(ProjectController::class);
        // $projectControllerMock->shouldReceive("with")->once()->andReturn(true);
        // $projectControllerMock->index();

        // $this->mock(Project::class, function (MockInterface $mock) {
        //     $mock-> shouldReceive("with ")->once()->andReturn(true);
        // });
    }

    public function test_create(): void {
        $repository = Mockery::mock(ProjectRepository::class);

        $view = Mockery::mock('Illuminate\View\Factory');
        $controller = new ProjectController($repository,$view);
        $controller->authorize('create', $repository->getNewProject );
        // Gate::shouldReceive('authorize')->with('create', Project::class)->andReturn(true);
        $view->shouldReceive('make')->with('portafolio.create')->once();
        $controller->create();
        $this->assertTrue(true);
    }



    public function getProjects()
    {
        return collect(new Project());
    }
}
