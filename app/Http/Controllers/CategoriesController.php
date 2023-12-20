<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function store(Category $category) {
        return view('portafolio.index',[
            // 'project'=> $category->projects TODO: realiza una petición cada vez que se utilza
            // 'project'=> $category->projects->load('category') TODO: carga la informacion de indicada en el load(':table')
            // 'project'=> $category->projects() TODO: obtenemos el modelo Project, dado que de esta forma tendremos acceso a paginate()
            'proyects'=> $category->projects()->with('category')->latest()->paginate(3),
            'category'=> $category
        ]);
    }
    //
}
