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
        return view('admin.student.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('admin.student.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
        'nis' => 'required',
        'nama_lengkap' => 'required',
        'jenis_kelamin' => 'required',
        'nisn' => 'required',
        ]);
        
        $student->update ($validated);
        return redirect()->route('admin.students.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->noContent();
    }
}