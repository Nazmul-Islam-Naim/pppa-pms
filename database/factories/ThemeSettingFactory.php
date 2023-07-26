<?php

namespace Database\Factories;

use App\Models\ThemeSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThemeSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ThemeSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>1,
            'theme_id' => 3,
        ];
    }
}
