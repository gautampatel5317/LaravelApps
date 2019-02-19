<?php
namespace App\Repositories\Backend\Services;
use App\Models\Category\Category;
use App\Models\Services\Services;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

/**
 * Class BlogsRepository.
 */

class ServicesRepository extends BaseRepository {
	/**
	 *
	 * getTableData
	 */
	public function getTableData() {
		$query = Services::
		leftjoin("category", "category.id", "=", "services.category_id")
			->leftjoin("category as category2", "category2.id", "=", "services.sub_category")
			->select(
			"services.id as servies_id",
			"services.category_id",
			"services.sub_category",
			"services.service_name",
			"services.description",
			"services.status",
			"services.start_date",
			"services.end_date",
			"services.created_at",
			"category.id as category_id",
			"category.name as mainCategory",
			"category2.name as sub_category"
		)
			->get()
			->toArray();
		return $query;
	}

	/**
	 *
	 * Category
	 */
	public function getCategory() {
		$category = Category::where('parent_id', 0)->with('parent_category')->pluck('name', 'id');
		return $category;
	}

	/**
	 *
	 * create servies
	 * @param $input
	 * @return boolean
	 */
	public function create($input) {
		$category               = new Services();
		$category->category_id  = $input['category_id'];
		$category->sub_category = $input['sub_category'];
		$category->service_name = $input['service_name'];
		$category->description  = $input['description'];
		$category->status       = isset($input['status'])?$input['status']:0;
		$category->start_date   = date('Y-m-d', strtotime($input['Start_date']));
		$category->end_date     = date('Y-m-d', strtotime($input['end_date']));
		$category->created_at   = Carbon::now();
		if ($category->save()) {
			return true;
		} else {
			throw new GeneralException('Services Create Error!');
		}
	}

	/**
	 *
	 * Update Service
	 * @param $id
	 * @return boolean
	 */
	public function update($services, $input) {

		$update = Services::where('id', $services['id'])->update([
				'category_id'  => $input['category_id'],
				'sub_category' => $input['sub_category'],
				'service_name' => $input['service_name'],
				'description'  => $input['description'],
				'status'       => isset($input['status'])?$input['status']:0,
				'start_date'   => date('Y-m-d', strtotime($input['Start_date'])),
				'end_date'     => date('Y-m-d', strtotime($input['end_date'])),
				'updated_at'   => Carbon::now()
			]);
		if ($update) {
			return true;
		} else {
			throw new Exception("Unable to update!", 1);
		}
	}

	/**
	 * @param \App\Models\services\services $services
	 *
	 * @throws GeneralException
	 *
	 * @return bool
	 */
	public function delete(Services $services) {
		return Services::where('id', $services['id'])->delete();
	}
}
