<?php


namespace App\Services;

use App\Models\Category;

final class CategoryService
{
    public function getAll($request) {
        // return exampleHelper($request['search']);
        return formatDate($request['search']);

        $data = Category::orderBy('id', 'desc')
        ->where('name', 'like', '%' . $request['search'] . '%')
        ->where('icon', 'icon1.png')
        ->paginate($request->per_page);

        return response()->json([
            'success' => true,
            'status' => 200,
            'categories' => $data
        ]);
    }

    public function postData($request) {
        $save = new Category();
        $save->name = $request->name;
        $save->icon = $request->icon;
        $save->save();

        return $save;
    }


    public function updateData($request, $id) {
        $update = Category::find($id);
        $update->name = $request->name;
        $update->icon = $request->icon;
        $update->save();

        return $update;
    }
}