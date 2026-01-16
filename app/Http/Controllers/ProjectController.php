<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Show the projects page.
     */
    public function index()
    {
        $name = 'Rakha';
        return view('project', compact('name'));
    }
}
