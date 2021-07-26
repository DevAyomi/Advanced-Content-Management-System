<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;


class category_controller extends Controller
{
    //

    public function allCat(){
    	return view('admin.category.index');
    }


    public function addCat(Request $request){
    	$validatedData = $request->validate([
	        'category_name' => 'required|unique:categories|max:255',
	    ]);


	    //Inserting With eloqouent orm
	    Category::insert([
	    	'category_name' => $request->category_name,
	    	'user_id' => Auth::user()->id,
	    	'created_at' => Carbon::now()
	    ]);

    }
}
