<?php
namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public function getPaginatedProjects(int $total = 10) {
        return Project::paginate($total);
    }
    public function onlyTrashed() {
        return Project::onlyTrashed()->get();
    }
    public function getNewProject() {
        return new Project;
    }
}
