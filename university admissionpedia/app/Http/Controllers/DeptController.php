<?php

/**
* 
*/
class DeptController extends \BaseController
{
	public function index($univ_code, $unit_name){
		$univ = University::where('univ_code',$univ_code)->first();
		
		$unit = Unit::where('univ_id', $univ->univ_id )
		 ->where('unit_name', $unit_name)->first();

		$dept = Department::where('univ_id', $univ->univ_id)
		->where('unit_id', $unit->unit_id)
		->get();

		return View::make('units.singleUnit')
			->with('univ', $univ)
			->with('unit', $unit)
			->with('dept', $dept);		
	}

	public function create($univ_code, $unit_name){
		
		$univ = University::where('univ_code',$univ_code)->first();
		
		$unit = Unit::where('univ_id', $univ->univ_id )
		 ->where('unit_name', $unit_name)->first();

		return View::make('dept.createDept')
			->with('univ', $univ)
			->with('unit', $unit);
				
	}

	public function store($univ_code, $unit_name){
		$univ = University::where('univ_code',$univ_code)->first();
		
		$unit = Unit::where('univ_id', $univ->univ_id )
		 ->where('unit_name', $unit_name)->first();

		$dept = new Department;
		$dept->univ_id = Input::get('univ_id');
		$dept->unit_id = Input::get('unit_id');
		$dept->dept_code = Input::get('dept_code');
		$dept->dept_name = Input::get('dept_name');
		$dept->seat = Input::get('seat');
		$dept->requirements = Input::get('requirements'); 

		$dept->save();

		return Redirect::to('addpedia/'.$univ->univ_code.'/'.$unit->unit_name)
			->with("message", "successfully created ".$dept->dept_code);
	}

	public function edit($univ_code, $unit_name, $dept_code){
		
		$univ = University::where('univ_code',$univ_code)->first();
		
		$unit = Unit::where('univ_id', $univ->univ_id )
		 ->where('unit_name', $unit_name)->first();

		$dept = Department::where('univ_id', $univ->univ_id)
		->where('unit_id', $unit->unit_id)
		->where('dept_code', $dept_code)
		->first();

		return View::make('dept.editUnit')
			->with('univ', $univ)
			->with('unit', $unit)
			->with('dept', $dept);		

	}

	public function update($univ_code, $unit_name, $dept_code){
		$univ = University::where('univ_code',$univ_code)->first();
		
		$unit = Unit::where('univ_id', $univ->univ_id )
		 ->where('unit_name', $unit_name)->first();

		$dept = Department::where('univ_id', $univ->univ_id)
		->where('unit_id', $unit->unit_id)
		->where('dept_code', $dept_code)
		->update(['univ_id' => Input::get('univ_id'), 'unit_id' => Input::get('unit_id'),
				'dept_code' => Input::get('dept_code'), 'dept_name' => Input::get('dept_name'),
				'seat' => Input::get('seat'), 'requirements' => Input::get('requirements')]);

		return Redirect::to('addpedia/'.$univ->univ_code.'/'.$unit->unit_name)
			->with("message", "successfully edited ".$dept_code);

	}

	public function delete($univ_code, $unit_name, $dept_code){
		
		$univ = University::where('univ_code',$univ_code)->first();
		
		$unit = Unit::where('univ_id', $univ->univ_id )
		 ->where('unit_name', $unit_name)->first();

		$dept = Department::where('univ_id', $univ->univ_id)
		->where('unit_id', $unit->unit_id)
		->where('dept_code', $dept_code)
		->first();

		DB::delete('delete from departments where dept_code=?', [$dept->dept_code]);

		return Redirect::to('addpedia/'.$univ->univ_code.'/'.$unit->unit_name)
			->with("message", "successfully deleted ".$dept_code);	
	}

}
















