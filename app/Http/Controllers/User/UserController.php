<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    
    public function getAllDatas(Request $request) {
        return $this->categoryService->getAll($request);
    }

    public function postData(Request $request) {
        return $this->categoryService->postData($request);
    }

    public function updateData(Request $request, $id) {
        return $this->categoryService->updateData($request, $id);
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
