<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Project;

class CategoryRepository
{
    public function pluckIdName() {
        return Category::pluck('nombre','id');
    }

}
