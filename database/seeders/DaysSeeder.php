<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Day;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            [
                'name'=>'Sunday'
            ],
            [
                'name'=>'Monday'
            ],
            [
                'name'=>'Tuesday'
            ],
            [
                'name'=>'Wednesday'
            ],
            [
                'name'=>'Thursday'
            ],
            [
                'name'=>'Friday'
            ],
            [
                'name'=>'Saturday'
            ],
        ];

        foreach($days as $day)
        {
            Day::create($day);
        }
    }
}
