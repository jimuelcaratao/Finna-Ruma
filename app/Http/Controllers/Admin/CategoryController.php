<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $tableCategories = Category::all();

        if ($tableCategories->isEmpty()) {
            $categories = Category::paginate();
        }

        if ($tableCategories->isNotEmpty()) {
            // $products = Product::paginate(5);

            // search validation
            $search = Category::where('category_name', 'like', '%' . request()->search . '%')
                ->first();


            if ($search === null) {
                return Redirect::route('admin.categories')->with('info', 'No "' . request()->search . '" found in the database.');
            }


            if ($search != null) {
                // default returning
                $categories = Category::Where('category_name', 'like', '%' . request()->search . '%')
                    ->latest()
                    ->paginate(10);
            }
        }

        return view('pages.admin.categories', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories',
        ]);

        if ($validator->fails()) {
            return Redirect::route('admin.categories')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        DB::table('categories')->insert([
            'category_name' => $request->input('category_name'),
        ]);

        return Redirect::route('admin.categories')->withSuccess('Category :' . $request->input('category_name') . '. Created Successfully!');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories',
            'category_id' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('categories')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        Category::where('category_id',  $request->input('category_id'))
            ->update([
                'category_name' => $request->input('category_name'),
            ]);

        return Redirect::route('admin.categories')->withSuccess('Category :' . $request->input('category_name') . '. Updated Successfully!');
    }

    public function destroy($category_id)
    {
        if (is_null($category_id)) {
            return Redirect::route('admin.categories')->withInfo('Yawa!');
        }

        // fetching info
        $category_fetch = Category::where('category_id', $category_id)->first();
        // Softdeletes
        Category::find($category_id)->delete();

        return Redirect::route('admin.categories')->withSuccess('Category (Category Name: ' . $category_fetch->category_name . '). Deleted Successfully!');
    }
}
