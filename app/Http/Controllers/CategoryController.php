<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::paginate(3);
        return view('Categories.index')->with('categories',$categories);
    }
    public function archive()
    {
        $categories = Category::onlyTrashed()->paginate(3);
        return view('Categories.archive')->with('categories',$categories);
    }

    
    public function create()
    {
        return view('Categories.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_ar'=>'required',
            'name_en'=>'required'
        ]);
        Category::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en
        ]);
        return redirect()->route('category.index');
    }

    
    public function edit($id)
    {
        $category = Category::where('id',$id)->first();
        return view('Categories.edit')->with('category' , $category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $category = Category::find($id);
        $category->name_ar = $request->name_ar;
        $category->name_en = $request->name_en;
        $category->save();

        return redirect()->route('Categories.index'); 
    }
    
    public function soft_delete($id)
    {
        $category = Category::find($id);    
        $category->delete();
        return redirect()->route('category.index');
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->find($id);    
        $category->restore();
        return redirect()->route('category.archive');
    }
    
    public function hard_delete($id)
    {
        Category::where('id', $id)->forceDelete();
        return redirect()->route('category.archive'); 
    }
}
