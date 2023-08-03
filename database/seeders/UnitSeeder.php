<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{

    protected $units = ['szt', 'kg', 'm', 'l', 'h', 'op'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->units as $unit) {
            Unit::create(['name' => $unit]);
        }
    }
}
