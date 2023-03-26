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

        // \App\Models\Role::factory()->create([
        //     'name' => 'super_admin',
        //     'menu_name' => 'Super Admin',
        //     'url' => '/super_admin',
        //     'icon' => 'fa-solid fa-user-plus',
        //     'disabled' => false
        // ]);

        // \App\Models\Role::factory()->create([
        //     'name' => 'santri',
        //     'menu_name' => 'Kesantrian',
        //     'url' => 'https://santri.kyaigalangsewu.net',
        //     'icon' => 'fa-solid fa-users',
        //     'disabled' => false
        // ]);
        // \App\Models\Role::factory()->create([
        //     'name' => 'sekretaris',
        //     'menu_name' => 'Administrasi',
        //     'url' => 'https://administrasi.kyaigalangsewu.net',
        //     'icon' => 'fa-solid fa-file',
        //     'disabled' => false
        // ]);
        // \App\Models\Role::factory()->create([
        //     'name' => 'bendahara',
        //     'menu_name' => 'Keuangan',
        //     'url' => 'https://keuangan.kyaigalangsewu.net',
        //     'icon' => 'fa-solid fa-money-bill',
        //     'disabled' => false
        // ]);
        // \App\Models\Role::factory()->create([
        //     'name' => 'keamanan',
        //     'menu_name' => 'Keamanan',
        //     'url' => 'https://keamanan.kyaigalangsewu.net',
        //     'icon' => 'fa-solid fa-shield-halved',
        //     'disabled' => false
        // ]);
        // \App\Models\Role::factory()->create([
        //     'name' => 'akademik',
        //     'menu_name' => 'Akademik',
        //     'url' => 'https://akademik.kyaigalangsewu.net',
        //     'icon' => 'fa-solid fa-graduation-cap',
        //     'disabled' => false
        // ]);
        // \App\Models\Role::factory()->create([
        //     'name' => 'admin_psb',
        //     'menu_name' => 'Penerimaan Santri Baru',
        //     'url' => 'https://psb.kyaigalangsewu.net',
        //     'icon' => 'fa-solid fa-user-graduate',
        //     'disabled' => false
        // ]);
        // \App\Models\Role::factory()->create([
        //     'name' => 'admin_bump',
        //     'menu_name' => 'BUMP',
        //     'url' => 'https://bump.kyaigalangsewu.net',
        //     'icon' => 'fa-solid fa-shop',
        //     'disabled' => false
        // ]);
        // \App\Models\Role::factory()->create([
        //     'name' => 'admin_puskestren',
        //     'menu_name' => 'Puskestren',
        //     'url' => 'https://puskestren.kyaigalangsewu.net',
        //     'icon' => 'fa-solid fa-notes-medical',
        //     'disabled' => false
        // ]);



        // \App\Models\User::factory()->create([
        //     'username' => 'nurdiansyah',
        //     'password' => bcrypt('nurdiansyah')
        // ]);

        // \App\Models\RoleUser::factory()->create([
        //     "user_id" => 1,
        //     "role_id" => 2 //default santri
        // ]);
        // \App\Models\User::factory()->create([
        //     'username' => 'santika',
        //     'password' => bcrypt('santika')
        // ]);

        // \App\Models\RoleUser::factory()->create([
        //     "user_id" => 2,
        //     "role_id" => 2 //default santri
        // ]);


        \App\Models\Security\SecActs::factory()->create([
            'name' => "Madrasah Diniyyah"
        ]);
    }
}
