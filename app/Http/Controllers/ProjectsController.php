<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {

        $int = 16;
        // always begin with 1
        $matchArray = [1];
        $patterInt = 1;
        for($i=1;$i<=$int;$i++){

            if($patterInt > $int){

                array_push($matchArray, ($patterInt = $patterInt - 4));
            }else{
                array_push($matchArray, ($patterInt = $patterInt + 4));
            }

        }

        dd($matchArray);



    }

    public function create() {
        return view('projects.create');
    }

    public function store() {
        $project = new Project();

        $project->title = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }
}
