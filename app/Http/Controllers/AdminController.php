<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Tutorials;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function home()
    {
        // get users limit 5
        $users = User::orderBy('created_at', 'desc')->Limit(5)->get();

        // get user all
        $users_all = User::all();

        // get tutorials
        $tutorials = Tutorials::orderBy('created_at', 'desc')->get();
        // get courses
        $courses = Course::all();
        // get comments
        $comments = Comment::orderBy('created_at', 'desc')->with(['user', 'tutorial'])->get();


        return view(
            'admin/admin-dashboard',
            compact(
                [
                    'users_all',
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
        Course::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'img_url' => $request->img_url
        ]);

        return back()->with('success', 'Course added successfully!');
    }

    public function deleteCourse($id)
    {
        Course::where('id', $id)->delete();

        return back()->with('successDelete', 'Course deleted successfully!');
    }

    public function editUser($id, Request $request)
    {
        User::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
            ]);

        return back()->with('updateSuccess', 'User updated successfully!');
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();

        return back()->with('successDelete', 'User deleted successfully!');
    }

    public function addCategory()
    {
        return view('admin.pages.add-category');
    }

    public function storeCategory(Request $request)
    {
        Category::create([
            'img_url' => $request->img_url,
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return back()->with('success', 'Category added successfully!');
    }

    public function updateCategory(Request $request)
    {
        Category::where('slug', $request->slug)
            ->update([
                'img_url' => $request->img_url,
                'name' => $request->name,
                'slug' => $request->slug,
                'status' => $request->status
            ]);

        return back()->with('updateSuccess', 'Category updated successfully!');
    }

    public function updateCourse(Request $request)
    {
        Course::where('slug', $request->slug)
            ->update([
                'img_url' => $request->img_url,
                'name' => $request->name,
                'slug' => $request->slug,
                'status' => $request->status
            ]);

        return back()->with('updateCourseSuccess', 'Course updated successfully!');
    }

    public function addAdmin(Request $request)
    {
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Admin added successfully!');
    }

    public function viewAdmin()
    {
        return view('admin.pages.add-admin');
    }

    public function manageTutorial()
    {
        $tutorials = Tutorials::orderBy('created_at', 'desc')->with('course')->get();
        $courses = Course::all();


        return view('admin.pages.manage-tutorials', compact(['tutorials', 'courses']));
    }

    public function viewTutorial()
    {
        $courses = Course::all();

        return view('admin.pages.add-tutorial', compact('courses'));
    }

    public function addTutorial(Request $request)
    {
        Tutorials::create([
            'course_id' => $request->course_id,
            'comment_id' => $request->commentid,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
            'author' => $request->author,
            'type' => $request->type,
            'level' => $request->level,
            'submitted_by' => $request->submitted_by,
            'views' => 0,
            'source_link' => $request->source_link
        ]);

        return back()->with('success', 'Tutorial added successfully!');
    }

    public function updateTutorial($id, Request $request)
    {
        Tutorials::where('id', $id)
            ->update([
                'course_id' => $request->course_id,
                'comment_id' => $request->commentid,
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-'),
                'description' => $request->description,
                'author' => $request->author,
                'type' => $request->type,
                'level' => $request->level,
                'submitted_by' => $request->submitted_by,
                'source_link' => $request->source_link,
                'status' => $request->status,
            ]);

        if ($request->user_id == 0) {
            return back()->with('updateTutorialSuccess', 'Tutorial updated successfully!');
        } else {
            $user = User::find($request->user_id)->value('points');
            $updatePoints = $user + 100;

            User::where('id', $request->user_id)->update([
                'points' => $updatePoints,
            ]);
        }


        return back()->with('updateTutorialSuccess', 'Tutorial updated successfully!');
    }

    public function deleteTutorial($id)
    {
        $tutor = Tutorials::findOrFail($id);
        $tutor->votes()->delete();
        $tutor->comments()->delete();
        $tutor->saves()->delete();
        $tutor->delete();

        return back()->with('successDelete', 'Tutorial deleted successfully!');
    }

    public function deleteComment($id)
    {
        Comment::where('id', $id)->delete();

        return back()->with('successDelete', 'Comment deleted successfully!');
    }
}