<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('manager')->get();
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        $managers = User::whereHas('roles', fn($q) => $q->where('name', 'admin'))->orWhere('name', 'like', '%مدير%')->get();
        return view('admin.departments.create', compact('managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departments',
            'manager_id' => 'nullable|exists:users,id',
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'تم إنشاء القسم بنجاح.');
    }

    public function edit(Department $department)
    {
        $managers = User::all();
        return view('admin.departments.edit', compact('department', 'managers'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $department->id,
            'manager_id' => 'nullable|exists:users,id',
        ]);

        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'تم تحديث القسم بنجاح.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return back()->with('success', 'تم حذف القسم بنجاح.');
    }
}