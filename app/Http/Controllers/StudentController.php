<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index', compact('students')); // tampilkan view, bukan JSON
    }

    public function create()
    {
        return view('admin.student.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nis' => 'required|unique:students,nis',
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'nisn' => 'nullable|string',
        ]);

        $student = Student::create($data);

        return response()->json($student, 201);
    }

    public function show(Student $student)
    {
        return response()->json($student);
    }

    public function edit(Student $student)
    {
        return response()->noContent();
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'nis' => 'sometimes|required|unique:students,nis,' . $student->id,
            'nama_lengkap' => 'sometimes|required|string',
            'jenis_kelamin' => 'sometimes|required|in:L,P',
            'nisn' => 'nullable|string',
        ]);

        $student->update($data);

        return response()->json($student);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->noContent();
    }
}