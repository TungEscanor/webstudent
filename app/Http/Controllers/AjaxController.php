<?php

namespace App\Http\Controllers;



use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Subject;

class AjaxController extends Controller
{
    public function getSubject($studentId) {
        $student = Student::findOrFail($studentId);
        $class = ClassModel::where('id',$student->class_id)->first();
        $subject = Subject::where('faculty_id', $class->faculty_id)
            ->orWhereHas('faculty', function ($query) {
                $query->where('name', 'Khoa cơ bản');
            })->get();
        foreach ($subject as $item ) {
            echo "<option value='".$item->id."'>".$item->name."</option>";
        }
    }
}
