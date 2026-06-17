<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index(Request $request)
    {
        $students = $this->studentService
            ->getPaginatedStudents(
                $request->search
            );

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classrooms = Classroom::all();
        return view('students.create', compact('classrooms'));
    }

    public function store(StoreStudentRequest $request)
    {
        try {

            $this->studentService->createStudent(
                $request->validated()
            );

            return redirect()
                ->route('students.index')
                ->with(
                    'success',
                    'Student created successfully.'
                );

        } catch (\DomainException $e) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }

    public function show(int $id)
    {
        $student = $this->studentService
            ->getStudentById($id);

        return view(
            'students.show',
            compact('student')
        );
    }

    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        return view(
            'students.edit',
            compact('student', 'classrooms')
        );
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {

            $this->studentService->updateStudent(
                $student,
                $request->validated()
            );

            return redirect()
                ->route('students.index')
                ->with(
                    'success',
                    'Student updated successfully.'
                );

        } catch (\DomainException $e) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }

    public function destroy(Student $student)
    {
        $this->studentService->deleteStudent(
            $student
        );

        return redirect()
            ->route('students.index')
            ->with(
                'success',
                'Student deleted successfully.'
            );
    }

}