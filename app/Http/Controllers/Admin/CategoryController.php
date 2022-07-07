<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\services\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\Category\StoreCategory;
use App\Services\Category\UpdateCategory;
use App\Http\Requests\storedCategoryRequest;
use App\Http\Traits\Product\GetInventoryTrait;
use App\Http\Traits\handleFile\DeleteFileTrait;

class CategoryController extends Controller
{
    private $store;
    private $updateCategory;
    use 
        GetInventoryTrait,
        DeleteFileTrait

    ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // protected function decreseInventoryQuantity($item){
    //     $inventory = $this->getInventory($item->product_id);
    //     $inventory->quantity -=  $item->quantity; 
    //     $inventory->save();
    // }
    public function index()
    {
        return  CategoryResource::collection(Category::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storedCategoryRequest $request, StoreCategory $StoreCategory){
        $this->store = $StoreCategory;
        return $this->store->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(storedCategoryRequest $request,UpdateCategory $updateCategory,Category $category)
    {
        $this->updateCategory = $updateCategory;
        return $this->updateCategory->update($request,$category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Delete img in server disk
        $this->deleteFile($category->photo,'categories');   
        $category->delete();
        return ResponseMessage::succesfulResponse();
    }
    
}
