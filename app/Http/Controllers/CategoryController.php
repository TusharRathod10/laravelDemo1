<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function category()
    {
        $category = Category::orderBy('id')->Paginate(5);
        return view('category/categories', ['category' => $category]);
    }
    public function create()
    {
        return view('category/create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'categories' => 'required|unique:categories',
            'profile' => 'required'
        ]);

        $category = new Category;
        $category->categories = $request->categories;

        //     if ($request->hasFile('profile')) {
        //         $file = $request->file('profile');
        //         $extension = $file->getClientOriginalExtension();
        //         $filename = rand(111111111, 999999999) . '.' . $extension;
        //         $file->move('assets/category/', $filename);
        //         $category->profile = $filename;
        //     }

        if ($files = $request->file('profile')) {
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = rand(111111111, 999999999) . '.' . $extension;
                $file->move('assets/category/', $filename);
                $image[] = $filename;
            }
            $category->profile = implode(',', $image);
        }

        $category->save();
        return redirect('/')->with('success', 'New Category Created');
    }
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('category/update', ['category' => $category]);
    }
    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();
        $category->categories = $request->categories;

        if ($request->hasFile('profile')) {
            foreach (explode(',', $category->profile) as $img) {
                $destination = 'assets/category/' . $img;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
            if ($files = $request->file('profile')) {
                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111111111, 999999999) . '.' . $extension;
                    $file->move('assets/category/', $filename);
                    $image[] = $filename;
                }
                $category->profile = implode(',', $image);
            }
            // $file = $request->file('profile');
            // $extension = $file->getClientOriginalExtension();
            // $filename = rand(111111111, 999999999) . '.' . $extension;
            // $file->move('assets/category/', $filename);
            // $category->profile = $filename;
        }

        $category->save();
        return redirect('/')->with('success', 'New Category Updated');
    }
    public function remove($id)
    {
        $category = Category::where('id', $id)->first();

        $image = explode(',', $category->profile);
        foreach ($image as $img) {
            $destination = 'assets/category/' . $img;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
        $category->delete();
        return redirect('/')->with('delete', 'Category Deleted');
    }
}
