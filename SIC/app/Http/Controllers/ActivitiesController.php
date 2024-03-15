<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivitiesRequest;
use App\Models\Activities;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activities::paginate(10);
        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActivitiesRequest $request)
    {
        $validatedData = $request->validated(); 
        $activities = new Activities([
            'activity_name' => $validatedData['activities_name'],
            'percentage' => $validatedData['activities_name'],
            'instructions' => $validatedData['comments']
        ]);

        $activities->save();

        return redirect()->route('activities.index')
            ->with('success', 'activities created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activities = Activities::find($id);
        return view('activities.show', compact('activities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activities = activities::find($id);
        return view('activities.edit', compact('activities'));
    }

    
    public function update(ActivitiesRequest $request, $id,): RedirectResponse
    {
        $validatedData = $request->validated(); 
        
        $activities = Activities::find($id);

        if(!$activities) {
            return redirect()->route('activities.index')->with('notificacion', 'Estudiante no encontrado');
        }

        $activities -> update ([
            'activities_name' => $validatedData['activities_name'],
            'activities_lastname' => $validatedData['activities_lastname'],
            'birthDate' => $validatedData['birthDate'],
            'comments' => $validatedData['comments']
        ]);


            
        return redirect()->route('activities.index')->with('notificacion', 'Estudiante actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $activities = Activities::find($id);
        if ($activities != null) {
            $activities->delete();
        }
        return redirect()->route('activities.index')
            ->with('success', 'activities deleted successfully');
    }
}
