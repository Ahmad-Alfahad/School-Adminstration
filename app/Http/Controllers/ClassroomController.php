<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Services\ClassroomService;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    protected ClassroomService $classroomService;

    public function __construct(ClassroomService $classroomService)
    {
        $this->classroomService = $classroomService;
    }

    public function index(Request $request)
    {
        $classrooms = $this->classroomService
            ->getPaginatedClassrooms(
                $request->search
            );

        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(StoreClassroomRequest $request)
    {
        try {

            $this->classroomService
                ->createClassroom($request->validated());

            return redirect()
                ->route('classrooms.index')
                ->with(
                    'success',
                    'Classroom created successfully.'
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

    public function show( int $id)
    {
        $classroom = $this->classroomService
            ->getClassroomById($id);

        return view(
            'classrooms.show',
            compact('classroom')
        );
    }

    public function edit(Classroom $classroom)
    {
        return view(
            'classrooms.edit',
            compact('classroom')
        );
    }

    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        try {

            $this->classroomService
                ->updateClassroom(
                    $classroom,
                    $request->validated()
                );

            return redirect()
                ->route('classrooms.index')
                ->with(
                    'success',
                    'Classroom updated successfully.'
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

    public function destroy(Classroom $classroom)
    {
        try {

            $this->classroomService
                ->deleteClassroom($classroom);

            return redirect()
                ->route('classrooms.index')
                ->with(
                    'success',
                    'Classroom deleted successfully.'
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

}
