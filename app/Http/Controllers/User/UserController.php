<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllDatas(Request $request) {
        $data = Category::orderBy('id', 'desc')->paginate($request->per_page);

        return response()->json([
            'success' => true,
            'status' => 200,
            'categories' => $data
        ]);
    }

    public function postData(Request $request) {
        $save = new Category();
        $save->name = $request->name;
        $save->icon = $request->icon;
        $save->save();

        return $save;
    }

    public function updateData(Request $request, $id) {
        $update = Category::find($id);
        $update->name = $request->name;
        $update->icon = $request->icon;
        $update->save();

        return $update;
    }

    public function deleteData($id) {
        $update = Category::find($id);
        $update->delete();

        return 'delete success';
    }

    public function getById($id) {
       $data = Category::findOrFail($id);

       return response()->json([
            'success' => true,
            'status' => 200,
            'categories' => $data
        ]);
    }
}
