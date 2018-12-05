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
        $nextPosition = 1;
        for($i=1;$i<=$int;$i++){
            $nextPosition = $nextPosition + 4;
            $minPlus = " + 4";
            if($nextPosition > $int){
                $lastestPosi = end($matchArray);
                if($lastestPosi > $int){
                    $patterInt = $patterInt - 4;
                }else{
                    $patterInt = $lastestPosi + 2;
                }
            }else{
                $patterInt = $patterInt + 4;
            }
            array_push($matchArray, $patterInt);


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
