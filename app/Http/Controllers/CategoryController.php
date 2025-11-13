<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('department')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.categories.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'تم إنشاء الفئة بنجاح.');
    }

    public function edit(Category $category)
    {
        $departments = Department::all();
        return view('admin.categories.edit', compact('category', 'departments'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'تم تحديث الفئة بنجاح.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'تم حذف الفئة بنجاح.');
    }
}