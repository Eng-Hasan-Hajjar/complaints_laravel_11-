<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
// الأدوار المطلوبة في نظام الشكاوى - جامعة الشهباء
        $roles = [
            'admin',    // مدير النظام (رقم 1 لاحقًا إذا أردت)
            'employee', // موظف الشؤون الطلابية / مكتب الشكاوى
            'doctor',   // دكتور / عضو هيئة تدريسية
            'student',  // طالب
        ];

        // Loop through each role and create it if it doesn't exist
        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['name' => $role] // Set the guard_name to 'role'
            );
        }
    }
}
