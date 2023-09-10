<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ClassSyllabus;

class ClassSyllabusTable extends DataTableComponent
{
    protected $model = ClassSyllabus::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Class Name", "class")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Download", "files")->format(function ($value, $column, $row) {
                // $value is the array of data in the "Files" column
                // $column is the Column instance
                // $row is the current row data

                $buttons = '';

                // Loop through the array and create a button for each value
                foreach (json_decode($value) as $file) {
                    $escapedFile = $file;
                    echo '<button class="btn btn-warning btn-sm rounded" data-file="' . htmlspecialchars($escapedFile, ENT_QUOTES, 'UTF-8') . '">Download</button>';
                }
                return $buttons;
            })->html(),
        ];
    }
}
