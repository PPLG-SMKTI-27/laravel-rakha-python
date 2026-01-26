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
        $name = 'Rakha_Wardhana';
        
        $projects = [
            [
                'id' => 1,
                'title' => 'CRUD_SYSTEM',
                'description' => 'Aplikasi manajemen data berbasis Laravel & MySQL. Fokus pada efisiensi query dan keamanan arsitektur database.',
                'technologies' => ['Laravel', 'MySQL', 'PHP']
            ],
            [
                'id' => 2,
                'title' => 'WEB_PORTFOLIO',
                'description' => 'Eksplorasi estetika Urban-Tech menggunakan Laravel Blade. Menggabungkan performa backend dengan desain street-art modern.',
                'technologies' => ['Laravel', 'Blade', 'CSS']
            ],
            [
                'id' => 3,
                'title' => 'AUDIO_DSP',
                'description' => 'Riset pengembangan Audio Plugin Concept. Implementasi digital signal processing untuk kebutuhan produksi musik modern.',
                'technologies' => ['DSP', 'Audio', 'C++']
            ]
        ];

        return view('project', compact('name', 'projects'));
    }

    /**
     * Show a specific project.
     */
    public function show($id)
    {
        $projects = $this->getProjects();
        $project = collect($projects)->firstWhere('id', $id);

        if (!$project) {
            abort(404, 'Project not found');
        }

        return view('project.show', compact('project'));
    }

    /**
     * Get all projects data.
     */
    private function getProjects()
    {
        return [
            [
                'id' => 1,
                'title' => 'CRUD_SYSTEM',
                'description' => 'Aplikasi manajemen data berbasis Laravel & MySQL. Fokus pada efisiensi query dan keamanan arsitektur database.',
                'technologies' => ['Laravel', 'MySQL', 'PHP']
            ],
            [
                'id' => 2,
                'title' => 'WEB_PORTFOLIO',
                'description' => 'Eksplorasi estetika Urban-Tech menggunakan Laravel Blade. Menggabungkan performa backend dengan desain street-art modern.',
                'technologies' => ['Laravel', 'Blade', 'CSS']
            ],
            [
                'id' => 3,
                'title' => 'AUDIO_DSP',
                'description' => 'Riset pengembangan Audio Plugin Concept. Implementasi digital signal processing untuk kebutuhan produksi musik modern.',
                'technologies' => ['DSP', 'Audio', 'C++']
            ]
        ];
    }
}
