<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::factory(10)
            ->sequence(
                fn (Sequence $sequence) => ['name' => 'Class '. $sequence->index + 1]
            )
            ->has(
                Section::factory(3)
                    ->sequence(
                        fn (Sequence $sequence) => ['name' => 'Section '. $sequence->index + 1]
                    )->has(
                        Student::factory(10)
                            ->state(function (array $attributes, Section $section) {
                                    return [
                                        'class_id' => $section->class_id,
                                        'section_id' => $section->id,
                                    ];
                                }
                            )
                    )
            )
            ->create();
    }
}
