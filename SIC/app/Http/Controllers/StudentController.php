<?php

namespace App\Http\Controllers;

use App\Http\Requests\studentRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(studentRequest $request)
    {
        $validatedData = $request->validated(); 
        $student = new Student([
            'student_name' => $validatedData['student_name'],
            'student_lastname' => $validatedData['student_lastname'],
            'birthDate' => $validatedData['birthDate'],
            'comments' => $validatedData['comments']
        ]);

        $student->save();

        return redirect()->route('student.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $students = Student::find($id);
        return view('student.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = Student::find($id);
        return view('student.edit', compact('students'));
    }

    
    public function update(studentRequest $request, $id,): RedirectResponse
    {
        $validatedData = $request->validated(); 
        
        $students = Student::find($id);

        if(!$students) {
            return redirect()->route('students.index')->with('notificacion', 'Estudiante no encontrado');
        }

        $students -> update ([
            'student_name' => $validatedData['student_name'],
            'student_lastname' => $validatedData['student_lastname'],
            'birthDate' => $validatedData['birthDate'],
            'comments' => $validatedData['comments']
        ]);


            
        return redirect()->route('student.index')->with('notificacion', 'Estudiante actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $students = Student::find($id);
        if ($students != null) {
            $students->delete();
        }
        return redirect()->route('student.index')
            ->with('success', 'Student deleted successfully');
    }

}
