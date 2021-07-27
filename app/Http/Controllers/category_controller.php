<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class category_controller extends Controller
{
    //

    public function allCat(){

    	$categories = Category::latest()->paginate(4);
    	/*$categories = DB::table('categories')->latest()->paginate(4);*/
    	return view('admin.category.index', compact('categories'));
    }


    public function addCat(Request $request){
    	$validatedData = $request->validate([
	        'category_name' => 'required|unique:categories|max:255',
	    ]);


	    //Inserting With eloqouent orm Method 1
	    Category::insert([
	    	'category_name' => $request->category_name,
	    	'user_id' => Auth::user()->id,
	    	'created_at' => Carbon::now()
	    ]);


	    //Method 2 of ORM
	   /* $category = new Category;
	    $category->category_name = $request->category_name;
	    $category->user_id = Auth::user()->id;
	    $category->save();*/

	    return Redirect()->back()->with('success', 'Category inserted successfully');

    }
}
