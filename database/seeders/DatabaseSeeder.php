<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Role::factory(1)->create();

        \App\Models\Role::factory()->create([
            'name' => 'super_admin'
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'santri'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'sekretaris'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'bendahara'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'keamanan'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'pendidikan'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'admin_psb'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'admin_bump'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'admin_puskestren'
        ]);
    }
}
