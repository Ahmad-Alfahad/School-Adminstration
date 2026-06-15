<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Services\ClassroomService;


class ClassroomController extends Controller
{
    protected $classroomService;

    public function __construct(ClassroomService $classroomService)
    {
        $this->classroomService = $classroomService;
    }

    public function index()
    {
        $classrooms = $this->classroomService->getAllClassroooms();

        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(StoreClassroomRequest $request)
    {
        $this->classroomService->createClassroom(
            $request->validated()
        );

        return redirect()
            ->route('classrooms.index')
            ->with(
                'success',
                'Classroom created successfully.'
            );
    }

    public function show($id)
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
        $this->classroomService->updateClassroom(
            $classroom,
            $request->validated()
        );

        return redirect()
            ->route('classrooms.index')
            ->with(
                'success',
                'Classroom updated successfully.'
            );
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
