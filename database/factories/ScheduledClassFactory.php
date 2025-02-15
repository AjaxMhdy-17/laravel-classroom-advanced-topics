<?php

namespace Database\Factories;

use App\Models\ScheduledClass;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduledClassFactory extends Factory
{
    /**
     * The name of the model this factory is for.
     *
     * @var string
     */
    protected $model = ScheduledClass::class;

    public function definition(): array
    {
        return [
            'teacher_id' => rand(2, 6),
            'class_type_id' => rand(1, 4),
            'date_time' => Carbon::now()->addDays(5)->addHours(rand(24, 120))->minutes(0)->seconds(0),
        ];
    }
}
