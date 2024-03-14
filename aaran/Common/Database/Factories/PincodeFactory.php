<?php

namespace Aaran\Common\Database\Factories;

use Aaran\Common\Models\Pincode;
use Illuminate\Database\Eloquent\Factories\Factory;

class PincodeFactory extends Factory
{
    protected $model = Pincode::class;
    public function definition(): array
    {
        return [
            'vname' => 'Pincode',
            'active_id' => 1
        ];
    }
}
