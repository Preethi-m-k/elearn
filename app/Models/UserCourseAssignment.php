<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCourseAssignment extends Model {

	protected $table 		= 'user_course_assignment';
	protected $primaryKey 	= 'id';
			
	public function __construct() {
		parent::__construct();
	}
    public function getcourse(){
    	return $this->belongsTo('Course', 'course_id', 'id');
    }
	public function loadCourse(){
		return $this->belongsTo('App\Models\Course', 'course_id', 'id');
	}
	public function loadUser(){
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}
}