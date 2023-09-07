<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\ClassList;
use App\Models\ClassSection;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;

class StudentsPageComponent extends Component
{
    #[Layout('livewire.frontend.layouts.common')]
    public function render()
    {
        $rr = [];
        $data = ClassList::with('sections');
        $sections = ClassSection::with('classes')->get();
        $getSection = ClassSection::select('section_name', 'section_student')
            ->get();

        $sectionData = [];

        foreach ($getSection as $sec) {
            $sectionName = $sec->section_name;
            $sectionStudent = $sec->section_student;

            // Check if the section name is already in the array
            if (array_key_exists($sectionName, $sectionData)) {
                // If it exists, add the student number to the existing value
                $sectionData[$sectionName] += $sectionStudent;
            } else {
                // If it doesn't exist, create a new key with the student number
                $sectionData[$sectionName] = $sectionStudent;
            }
        }
        // dd($sectionData);
        $classes = $data->get();
        $data->selectRaw('ROUND(SUM(boys + girls)) as total');
        $total = (int) $data->first()->total;
        $data->selectRaw('SUM(boys) as boys_count, SUM(girls) as girls_count');
        $stu_count = $data->first();
        $boys_count = (int) $stu_count->boys_count;
        $girls_count = (int) $stu_count->girls_count;
        // Retrieve unique section names
        $uniqueSections = DB::table('class_sections')
            ->select('section_name')
            ->distinct()
            ->pluck('section_name');

        // Retrieve class data with section student counts
        $classData = DB::table('class_lists')
            ->select('class_name', 'id as class_id')
            ->get();

        // Add section student counts to the class data
        foreach ($classData as $class) {
            $class->section_students = DB::table('class_sections')
                ->where('class_list_id', $class->class_id)
                ->whereIn('section_name', $uniqueSections)
                ->pluck('section_student', 'section_name')
                ->toArray();
        }

        // dd($classData);
        return view(
            'livewire.frontend.students-page-component',
            ['classData' => $classData, 'uniqueSections' => $uniqueSections, 'sectionData' => $sectionData, 'classes' => $classes, 'sections' => $sections, 'total' => $total, 'boys_count' => $boys_count, 'girls_count' => $girls_count]
        );
    }
}
