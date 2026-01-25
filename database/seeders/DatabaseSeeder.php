<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;
use App\Models\Department;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\Comment;
use App\Models\ComplaintNotification;
use App\Models\ComplaintTrack;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           
            RolesTableSeeder::class,

        ]);


 $faker = Faker::create('ar_SA');

        // =========================
        // 1) Users (Admin / Employees / Doctors / Students)
        // =========================
        $admin = User::create([
            'name' => 'مدير النظام',
            'email' => 'admin@ucms.test',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'visit_count' => rand(10, 50),
            'remember_token' => Str::random(10),
        ]);

        $employees = collect();
        for ($i = 1; $i <= 5; $i++) {
            $employees->push(User::create([
                'name' => "موظف {$i}",
                'email' => "employee{$i}@ucms.test",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'visit_count' => rand(5, 40),
                'remember_token' => Str::random(10),
            ]));
        }

        $doctors = collect();
        for ($i = 1; $i <= 5; $i++) {
            $doctors->push(User::create([
                'name' => "دكتور {$i}",
                'email' => "doctor{$i}@ucms.test",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'visit_count' => rand(5, 40),
                'remember_token' => Str::random(10),
            ]));
        }

        $students = collect();
        for ($i = 1; $i <= 25; $i++) {
            $students->push(User::create([
                'name' => $faker->name(),
                'email' => "student{$i}@ucms.test",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'visit_count' => rand(0, 20),
                'remember_token' => Str::random(10),
            ]));
        }

        // (اختياري) إذا عندك Spatie roles:
        // لن يكسر المشروع إذا الحزمة غير موجودة
        if (method_exists($admin, 'assignRole')) {
            $admin->assignRole('admin');
            $employees->each(fn($u) => $u->assignRole('employee'));
            $doctors->each(fn($u) => $u->assignRole('doctor'));
            $students->each(fn($u) => $u->assignRole('student'));
        }
         


        // =========================
        // 2) Departments (manager_id من doctors)
        // =========================
        $deptNames = [
            'شؤون الطلاب',
            'المالية',
            'الهندسة المعلوماتية',
            'الطب البشري',
            'الدراسات العليا',
        ];

        $departments = collect();
        foreach ($deptNames as $idx => $name) {
            $departments->push(Department::create([
                'name' => $name,
                'manager_id' => $doctors[$idx]->id ?? $doctors->random()->id,
            ]));
        }

        // =========================
        // 3) Categories (لكل قسم 3 فئات)
        // =========================
        $categories = collect();
        foreach ($departments as $dept) {
            $catBase = [
                'شكاوى عامة',
                'طلبات ومراجعات',
                'مشاكل فنية/إدارية',
            ];

            foreach ($catBase as $c) {
                $categories->push(Category::create([
                    'name' => "{$c} - {$dept->name}",
                    'department_id' => $dept->id,
                ]));
            }
        }

        // =========================
        // 4) Complaints (كثيرة + assigned + status)
        // =========================
        $priorities = ['low', 'medium', 'high', 'urgent'];
        $statuses   = ['pending', 'in_review', 'resolved', 'closed'];

        $complaints = collect();

        for ($i = 1; $i <= 80; $i++) {
            $student = $students->random();
            $dept = $departments->random();

            $deptCategories = $categories->where('department_id', $dept->id);
            $cat = $deptCategories->isNotEmpty() ? $deptCategories->random() : null;

            $status = $faker->randomElement($statuses);

            // assigned_to: إذا الحالة in_review/resolved/closed غالباً يوجد مسؤول
            $assignedTo = null;
            if (in_array($status, ['in_review','resolved','closed'])) {
                $assignedTo = $faker->boolean(70)
                    ? $employees->random()->id
                    : $doctors->random()->id;
            }

            $complaint = Complaint::create([
                'user_id' => $student->id,
                'title' => 'شكوى: ' . $faker->sentence(4),
                'description' => $faker->paragraph(3),
                'category_id' => $cat?->id,
                'department_id' => $dept->id,
                'priority' => $faker->randomElement($priorities),
                'status' => $status,
                'assigned_to' => $assignedTo,
                'attachment' => null, // تركناها null لأننا لا نريد مسارات لملفات غير موجودة
            ]);

            $complaints->push($complaint);

            // =========================
            // 5) Comments (0-5 تعليقات)
            // =========================
            $commentsCount = rand(0, 5);
            for ($j = 1; $j <= $commentsCount; $j++) {
                $isAdmin = $faker->boolean(55);

                $commentUser = $isAdmin
                    ? ($faker->boolean(50) ? $employees->random() : $admin)
                    : $student;

                Comment::create([
                    'complaint_id' => $complaint->id,
                    'user_id' => $commentUser->id,
                    'message' => $isAdmin
                        ? 'تمت مراجعة الشكوى وسيتم الرد قريباً. ' . $faker->sentence()
                        : 'أرجو متابعة الشكوى. ' . $faker->sentence(),
                    'is_admin' => $isAdmin,
                ]);
            }

            // =========================
            // 6) Notifications
            // =========================
            ComplaintNotification::create([
                'user_id' => $student->id,
                'complaint_id' => $complaint->id,
                'message' => "تم إنشاء شكواك رقم #{$complaint->id} بنجاح.",
                'read_at' => $faker->boolean(40) ? now()->subDays(rand(0,10)) : null,
            ]);

            if ($assignedTo) {
                ComplaintNotification::create([
                    'user_id' => $assignedTo,
                    'complaint_id' => $complaint->id,
                    'message' => "تم تعيينك على الشكوى رقم #{$complaint->id}.",
                    'read_at' => $faker->boolean(60) ? now()->subDays(rand(0,10)) : null,
                ]);
            }

            // =========================
            // 7) Tracks (زيارات تتبع)
            // =========================
            $trackCount = rand(0, 4);
            for ($t = 1; $t <= $trackCount; $t++) {
                ComplaintTrack::create([
                    'complaint_id' => $complaint->id,
                    'ip_address' => $faker->ipv4(),
                    'user_agent' => $faker->userAgent(),
                ]);
            }
        }
    





    }
}
