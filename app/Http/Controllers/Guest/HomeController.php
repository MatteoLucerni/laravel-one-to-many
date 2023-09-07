<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $types = Type::select('id', 'label')->get();
        return view('guest.home', compact('projects', 'types'));
    }
}
