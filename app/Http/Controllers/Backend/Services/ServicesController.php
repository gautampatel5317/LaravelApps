<?php

namespace App\Http\Controllers\Backend\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Services\CreateService;
use App\Http\Requests\Services\StoreServiceRequest;
use App\Http\Requests\Services\DeleteService;
use App\Http\Requests\Services\EditService;
use App\Http\Requests\Services\ManageServiceRequest;
use App\Http\Requests\Services\UpdateService;
use App\Models\Category\Category;
use App\Models\Services\Services;
use App\Repositories\Backend\Services\ServicesRepository;
use Illuminate\Http\Request;

class ServicesController extends Controller {

	/**
	 * @param \App\Repositories\Backend\services\ServicesRepository $services
	 */
	public function __construct(ServicesRepository $services) {
		$this->services = $services;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(ManageServiceRequest $request) {
		$getData = $this->services->getTableData();
		return view('backend.services.index', compact('getData'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(CreateService $request) {
		$category = $this->services->getCategory();
		return view('backend.services.create', compact('category'));
	}

	/**
	 * get Subcategory
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getSubCategory(Request $request) {
		$subCategory = Category::where('parent_id', '!=', 0)->where('parent_id', $request['catId'])->select('id', 'name')->get()->toArray();
		return response()->json($subCategory);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreServiceRequest $request) {
		$input  = $request->except('_token');
		$create = $this->services->create($input);
		flash('Service Created Successfully!')->success();
		return redirect()->route('admin.services.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Services $service, EditService $request) {
		$category    = $this->services->getCategory();
		$subCategory = Category::where('parent_id', $service['category_id'])->pluck('name', 'id');

		return view('backend.services.edit', compact('category', 'service', 'subCategory'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Services $service, UpdateService $request) {
		$input  = $request->except('_token', '_method');
		$update = $this->services->update($service, $input);
		flash('Service Updated Successfully!')->success();
		return redirect()->route('admin.services.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(services $service, DeleteService $request) {
		$delete = $this->services->delete($service);
		flash('Service Deleted Successfully!')->success();
		return redirect()->route('admin.services.index');
	}
}
