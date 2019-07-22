<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkRequest;
use App\Repositories\Mark\MarkRepositoryInterface;


class MarkController extends Controller
{
    protected $markRepository;

    public function __construct(MarkRepositoryInterface $markRepository)
    {
        $this->markRepository = $markRepository;
    }


    public function index()
    {
        $marks = $this->markRepository->getAllList();
        return view('marks.index', compact('marks'));
    }

    public function create()
    {
        $data = $this->markRepository->showStudentAndSubject();
        return view('marks.create', compact('data'));
    }

    public function store(MarkRequest $request)
    {

        $data = [];
        if (count($request->student_id) > 0) {
            foreach ($request->student_id as $item => $value) {
                array_push($data, [
                    'subject_id' => $request->subject_id[$item],
                    'student_id' => $request->student_id[$item],
                    'mark' => $request->mark[$item],
                ]);
            }
        }
        $check = $this->markRepository->checkStudentAndSubject($data);

        if (!empty($check)) {
            $diff = $data;
            $del = [];
            foreach ($check as $key => $value) {

                if (!empty($diff)) {
                    for ($i = 0; $i < count($diff); $i++) {
                        if ($diff[$i]['student_id'] == $value['student_id'] &&
                            $diff[$i]['subject_id'] == $value['subject_id']) {
                            $del[] = (int) $i;
                        }
                    }
                }
                $this->markRepository->update($value['id'], $value);
            }

            if (!empty($del)) {
                foreach ($del as $key => $value) {
                    unset($diff[$value]);
                }
            }
            if (!empty($diff)) {
                foreach ($diff as $key => $value) {

                    $this->markRepository->store($value);
                }
            }
        } else {
            foreach ($data as $key => $value) {
                $this->markRepository->store($value);
            }
        }
        return redirect($request->redirects_to)->with('success', 'Done !');
    }

    public function edit($id)
    {
        $data = $this->markRepository->showStudentAndSubject();
        $mark = $this->markRepository->getListById($id);
        return view('marks.edit', compact('data'), compact('mark'));
    }


    public function update($id, MarkRequest $request)
    {

    }

    public function destroy($id)
    {
        $this->markRepository->destroy($id);
        return back()->with('success', 'Delete mark successfully');
    }


}
