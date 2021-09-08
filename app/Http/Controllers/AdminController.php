<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Tutorials;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        // get users
        $users = User::orderBy('created_at', 'desc')->Limit(5)->get();

        // get tutorials
        $tutorials = Tutorials::all();
        // get courses
        $courses = Course::all();
        // get comments
        $comments = Comment::orderBy('created_at', 'desc')->with(['user', 'tutorial'])->get();


        return view(
            'admin/admin-dashboard',
            compact(
                [
                    'users',
                    'tutorials',
                    'courses',
                    'comments'
                ]
            )
        );
    }

    public function manageUsers()
    {
        // get users
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.pages.manage-users', compact(['users']));
    }

    public function manageCourses()
    {
        // get users
        $courses = Course::orderBy('created_at', 'desc')->with('category')->get();
        // get category
        $categories = Category::all();

        return view('admin.pages.manage-courses', compact(['courses', 'categories']));
    }

    public function manageComments()
    {
        $comments = Comment::orderBy('created_at', 'desc')->with(['tutorial'])->get();

        return view('admin.pages.manage-comments', compact('comments'));
    }

    public function addCourse()
    {
        // get category
        $categories = Category::all();
        return view('admin.pages.add-course', compact('categories'));
    }

    public function storeCourse(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'img_url' => 'required'
        ]);

        Course::create($validated);

        return back()->with('success', 'Course added successfully!');
    }

    public function deleteCourse($id)
    {
        Course::where('id', $id)->delete();

        return back()->with('successDelete', 'Course deleted successfully!');
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();

        return back()->with('successDelete', 'User deleted successfully!');
    }

    public function updateCategory(Request $request)
    {
        Category::where('slug', $request->slug)
            ->update([
                'img_url' => $request->img_url,
                'name' => $request->name,
                'slug' => $request->slug,
            ]);

        return back()->with('updateSuccess', 'Category updated successfully!');
    }
}
