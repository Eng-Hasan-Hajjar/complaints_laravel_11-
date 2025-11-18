<?php
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\RoleController;

use App\Http\Controllers\AdminDashboardController;




use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
require __DIR__.'/auth.php';

// ==================== الروتات المحمية (يتطلب تسجيل الدخول) ====================
Route::middleware(['auth'])->group(function () {

    // --------------------- لوحة التحكم ---------------------
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // --------------------- الشكاوى (متاحة للجميع) ---------------------
    Route::resource('complaints', ComplaintController::class)
        ->parameters(['complaints' => 'complaint']);

    // إجراءات إضافية على الشكاوى
    Route::post('/complaints/{complaint}/assign', [ComplaintController::class, 'assign'])
        ->name('complaints.assign')
        ->middleware('role:admin|employee');

    Route::post('/complaints/{complaint}/status', [ComplaintController::class, 'updateStatus'])
        ->name('complaints.status')
        ->middleware('role:admin|employee|doctor');

    Route::post('/complaints/{complaint}/comment', [ComplaintController::class, 'comment'])
        ->name('complaints.comment');

    // --------------------- إدارة الأقسام (أدمن فقط) ---------------------
    Route::middleware('role:admin')->group(function () {
        Route::resource('departments', DepartmentController::class)
            ->except(['show'])
            ->parameters(['departments' => 'department']);
    });

    // --------------------- إدارة الفئات (أدمن فقط) ---------------------
    Route::middleware('role:admin')->group(function () {
        Route::resource('categories', CategoryController::class)
            ->except(['show'])
            ->parameters(['categories' => 'category']);
    });



    // --------------------- الإشعارات (اختياري) ---------------------
    Route::get('/notifications', function () {
        $notifications = auth()->user()->notifications()->latest()->paginate(20);
        auth()->user()->notifications()->update(['read_at' => now()]);
        return view('notifications.index', compact('notifications'));
    })->name('notifications.index');

});










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 // روابط التحكم بالمستخدمين 
Route::get('/users', [UserController::class, 'index'])->name('users.index'); // عرض قائمة المستخدمين
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // إضافة مستخدم جديد
Route::post('/users', [UserController::class, 'store'])->name('users.store'); // تخزين مستخدم جديد
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show'); // عرض تفاصيل مستخدم معين
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // تعديل مستخدم
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update'); // تحديث بيانات المستخدم
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // حذف مستخدم
//Route::match(['get', 'post'], '/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('user.assign.role');
Route::post('/users/assign-role', [UserController::class, 'assignRole'])->name('user.assign.role');
//Route::post('/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('user.assign.role');
Route::delete('/users/{user}/remove-role/{role}', [UserController::class, 'removeRole'])->name('user.remove.role');
Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
});
Route::get('admin-page',function(){
    return view('admin.index');
});
Route::get('template',function(){
    return view('website.index');
});
/**************************************************   website   */

Route::get('/', [UserController::class, 'index_web_main'])->name('main_home'); 



Route::get('about-web',function(){
    return view('website.pages.about');
})->name('about');

Route::get('contact-web',function(){
    return view('website.pages.contact');
})->name('contact');
