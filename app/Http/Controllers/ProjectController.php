<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Show project dashboard (public).
     */
    public function dashboard()
    {
        $projects = Project::all();
        return view('project', compact('projects'));
    }

    /**
     * Show all projects for dashboard management.
     */
    public function dashboardProjects()
    {
        $projects = Project::all();
        return view('dashboard.projects', compact('projects'));
    }

    /**
     * Show create form for dashboard.
     */
    public function projectCreate()
    {
        return view('dashboard.create-project');
    }

    /**
     * Store a new project from dashboard.
     */
    public function projectStore(Request $request)
    {
        $validated = $request->validate([
            'judul_project' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'teknologi' => 'required|string',
            'link_project' => 'nullable|url',
        ]);

        // Convert teknologi string to array
        $validated['teknologi'] = array_map('trim', explode(',', $validated['teknologi']));

        Project::create($validated);

        return redirect()->route('dashboard.projects')
            ->with('success', 'Project berhasil ditambahkan!');
    }

    /**
     * Show edit form for dashboard.
     */
    public function projectEdit(Project $project)
    {
        return view('dashboard.edit-project', compact('project'));
    }

    /**
     * Update project from dashboard.
     */
    public function projectUpdate(Request $request, Project $project)
    {
        $validated = $request->validate([
            'judul_project' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'teknologi' => 'required|string',
            'link_project' => 'nullable|url',
        ]);

        // Convert teknologi string to array
        $validated['teknologi'] = array_map('trim', explode(',', $validated['teknologi']));

        $project->update($validated);

        return redirect()->route('dashboard.projects')
            ->with('success', 'Project berhasil diupdate!');
    }

    /**
     * Delete project from dashboard.
     */
    public function projectDestroy(Project $project)
    {
        $project->delete();

        return redirect()->route('dashboard.projects')
            ->with('success', 'Project berhasil dihapus!');
    }
}


