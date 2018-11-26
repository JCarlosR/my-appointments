<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AppointmentController extends Controller
{

/*
"id",
"description",
"specialty_id",
"doctor_id",
"patient_id",
"scheduled_date",
"scheduled_time",
"type",
"created_at",
"updated_at",
"status",
*/	
    public function index()
    {
    	$user = Auth::guard('api')->user();
    	$appointments = $user->asPatientAppointments()
	    	->with([
	    		'specialty' => function ($query) {
	    			$query->select('id', 'name');
	    		}, 
	    		'doctor' => function ($query) {
	    			$query->select('id', 'name');
	    		}
	    	])
	    	->get([
				"id",
				"description",
				"specialty_id",
				"doctor_id",
				"scheduled_date",
				"scheduled_time",
				"type",
				"created_at",
				"status"
	    	]);

    	return $appointments;
    }

    public function store()
    {

    }
}
