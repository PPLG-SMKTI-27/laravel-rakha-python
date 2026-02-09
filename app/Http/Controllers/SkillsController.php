<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Session;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }

    // Helper method untuk check login
    private function checkLogin()
    {
        if (!Session::has('user')) {
            // Redirect ke login dengan error message
            return redirect()->route('login')
                ->with('error', 'Please login first')
                ->send();
        }
    }

    public function dashboardSkills()
    {
        $this->checkLogin();
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        $this->checkLogin();
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $this->checkLogin();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Skill::create($request->all());

        return redirect()->route('dashboard.skills')->with('success', 'Skill created successfully.');
    }

    public function edit(Skill $skill)
    {
        $this->checkLogin();
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $this->checkLogin();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $skill->update($request->all());

        return redirect()->route('dashboard.skills')->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        $this->checkLogin();
        $skill->delete();

        return redirect()->route('dashboard.skills')->with('success', 'Skill deleted successfully.');
    }
}