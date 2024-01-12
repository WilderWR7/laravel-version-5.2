<?php

namespace Tests\Feature\Unit;

use App\Events\ProjectSaved;
use App\Http\Controllers\ProjectController;
use App\Http\Requests\SaveProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Repositories\CategoryRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\Factory;
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
         $projectRepository = Mockery::mock(ProjectRepository::class);
        $categoryRepository = Mockery::mock(CategoryRepository::class);
        $projectRepository->shouldReceive('getPaginatedProjects')
            ->withAnyArgs()
            ->once()->andReturn('paginatedProjects');
            $projectRepository->shouldReceive('onlyTrashed')->once()->andReturn('recycledProjects');
            // ->andReturn($projects);
        $view = Mockery::mock('Illuminate\View\Factory');
        $controller = new ProjectController($projectRepository,$categoryRepository,$view);
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
        Gate::shouldReceive('allows')->with('create-projects')->andReturn(true);

        $projectRepository = Mockery::mock(ProjectRepository::class);
        $categoryRepository = Mockery::mock(CategoryRepository::class);

        $view = Mockery::mock('Illuminate\View\Factory');

        $projectRepository->shouldReceive('getNewProject')
        ->withAnyArgs()
        ->once()->andReturn('newProject');
        $categoryRepository->shouldReceive('pluckIdName')
        ->withAnyArgs()
        ->once()->andReturn('pluckIdName');


        $controller = new ProjectController($projectRepository,$categoryRepository,$view);

        $view->shouldReceive('make')
        ->with('portafolio.create',['project'=> 'newProject','categories'=>'pluckIdName'])
        ->once();

        $controller->create();

        $this->assertTrue(true);
    }

    public function test_show ():void {
        $projectRepositoryMock = Mockery::mock(ProjectRepository::class);
        $categoryRepositoryMock = Mockery::mock(CategoryRepository::class);
        $viewMock = Mockery::mock('Illuminate\View\Factory');
        $projectMock = Mockery::mock(Project::class);
        $viewMock->shouldReceive('make')->with('portafolio.show',['project'=>$projectMock]);
        $controller = new ProjectController($projectRepositoryMock,$categoryRepositoryMock,$viewMock);
        $controller->show($projectMock);
        $this->assertTrue(true);
    }

    public function test_store ():void {
        Gate::shouldReceive('allows')->with('create-projects')->andReturn(true);
        $saveProjectRequestMock = Mockery::mock(SaveProjectRequest::class);
        $projectRepositoryMock = Mockery::mock(ProjectRepository::class);
        $categoryRepositoryMock = Mockery::mock(CategoryRepository::class);
        $viewMock = Mockery::mock(Factory::class);
        $projectMock = Mockery::mock(Project::class);
        $uploadFileMock = Mockery::mock(UploadedFile::class);
        $projectSavedMock = Mockery::mock(ProjectSaved::class);

        $projectRepositoryMock->shouldReceive('createProject')->with($saveProjectRequestMock)->once()->andReturn($projectMock);
        $uploadFileMock->shouldReceive('store')->with('images','public')->andReturn('storeLoad');
        $saveProjectRequestMock->shouldReceive('file')->with('image')->once()->andReturn($uploadFileMock);

        $projectMock->shouldReceive('setAttribute')->once()->andReturn('attribute');
        $projectMock->shouldReceive('save')->once()->andReturn('project');

        $projectSavedMock->shouldReceive('dispatch')->with('project')->once()->andReturn('projectDispatch');
        $controller = new ProjectController($projectRepositoryMock,$categoryRepositoryMock,$viewMock);
        $controller->store($saveProjectRequestMock);

    }
    public function getProjects()
    {
        return collect(new Project());
    }
}
