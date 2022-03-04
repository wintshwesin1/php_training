<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Major;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->delete();

        $majors = [
            ['id' => 1, 'name' => 'Myanmar'],
            ['id' => 2, 'name' => 'English'],
            ['id' => 3, 'name' => 'Mathematics'],
            ['id' => 4, 'name' => 'Science'],
        ];

        foreach($majors as $major){
            Major::create($major);
        }
    }
}
