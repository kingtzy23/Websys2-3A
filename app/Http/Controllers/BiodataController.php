<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BiodataController extends Controller
{
    // Show the form
    public function index()
    {
        return view('biodata-form');
    }

    // Generate preview in new tab
    public function preview(Request $request)
    {
        $data = $this->validateAndPrepareData($request);
        return view('biodata-preview', $data);
    }

    // Generate PDF
    // public function generatePdf(Request $request)
    // {
    //     $data = $this->validateAndPrepareData($request);

    //     $pdf = Pdf::loadView('biodata-pdf', $data);

    //     return $pdf->download('biodata-' . str_replace(' ', '-', strtolower($data['name'])) . '.pdf');
    // }

    // Helper method to get Pangasinan age translation
    private function getPangasinanAge($age)
    {
        $ones = ['', 'sakey', 'dua', 'talo', 'apat', 'lima', 'anem', 'pito', 'walo', 'siam'];
        $tens = ['', '', 'Duampulo', 'Talompulo', 'Apatnapulo', 'Limampulo', 'Anmampulo', 'Pitompulo', 'Walompulo', 'Siampulo'];
        
        if ($age < 10) {
            return ucfirst($ones[$age]);
        } elseif ($age < 100) {
            $ten = floor($age / 10);
            $one = $age % 10;
            
            if ($one == 0) {
                return $tens[$ten];
            } else {
                return $tens[$ten] . '\'t ' . $ones[$one];
            }
        }
        
        return 'Age: ' . $age;
    }

    // Validate and prepare data
    private function validateAndPrepareData(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'linkedin' => 'nullable|url|max:255',
            'gitlab' => 'nullable|url|max:255',
            'address' => 'required|string|max:500',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'nationality' => 'required|string|max:100',
            'religion' => 'nullable|string|max:100',
            'civil_status' => 'nullable|string|max:50',
            'summary' => 'nullable|string|max:1000',
            'skills' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'education' => 'nullable|array',
            'education.*.year' => 'nullable|string',
            'education.*.degree' => 'nullable|string',
            'education.*.school' => 'nullable|string',
            'projects' => 'nullable|array',
            'projects.*.year' => 'nullable|string',
            'projects.*.title' => 'nullable|string',
            'projects.*.description' => 'nullable|string',
        ]);

        // Handle photo upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('biodata-photos', 'public');
        }

        // Calculate age
        $dob = new \DateTime($validated['dob']);
        $now = new \DateTime();
        $age = $now->diff($dob)->y;

        // Age language logic
        $ageLanguage = '';
        if ($age == 21) {
            $ageLanguage = 'Dalawampu\'t isa'; // Tagalog
        } elseif ($age >= 22 && $age <= 23) {
            // Ilocano
            $ageLanguage = $age == 22 ? 'Duapulo ket dua' : 'Duapulo ket tallo';
        } elseif ($age >= 24) {
            // Pangasinan
            $ageLanguage = $this->getPangasinanAge($age);
        }

        // Convert skills string to array
        $skills = !empty($validated['skills']) 
            ? array_map('trim', explode(',', $validated['skills'])) 
            : [];

        return array_merge($validated, [
            'age' => $age,
            'ageLanguage' => $ageLanguage, // Fixed variable name to match the view
            'skills_array' => $skills,
            'photo_path' => $photoPath
        ]);
    }
}