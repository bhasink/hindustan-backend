<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\FeePlan;
use App\Models\Semester;
use App\Models\CourseLeads;


class MainController extends Controller
{

    public function listing(){
        $data = array();

        $get_all_courses = Course::orderBy('id','asc')->get();
        $get_courses = Course::orderBy('id','asc')->paginate(6);
        $get_courses_masters = Course::where('course_type',1)->orderBy('id','asc')->paginate(6);
        $get_courses_bachelors = Course::where('course_type',2)->orderBy('id','asc')->paginate(6);
        $get_courses_trending = Course::where('is_trending',1)->orderBy('id','asc')->paginate(6);

        $data['get_courses'] = $get_courses;
        $data['get_courses_masters'] = $get_courses_masters;
        $data['get_courses_bachelors'] = $get_courses_bachelors;
        $data['get_courses_trending'] = $get_courses_trending;
        $data['get_all_courses'] = $get_all_courses;

        return response()->json(['data'=>$data]);
    }

    public function filter_data(Request $request){
        $data = array();
        $course_type = $request->course_type;

        if($course_type == "masters"){
            $get_courses = Course::where('course_type',1)->orderBy('id','asc')->paginate(6);
        }else if($course_type == "bachelors"){
            $get_courses = Course::where('course_type',2)->orderBy('id','asc')->paginate(6);
        }else if($course_type == "trending"){
            $get_courses = Course::where('is_trending',1)->orderBy('id','asc')->paginate(6);
        }else{
            $get_courses = Course::orderBy('id','asc')->paginate(6);
        }

        $data['get_courses'] = $get_courses;

        return response()->json(['data'=>$data]);
    }

    public function get_course_details(Request $request){
        $slug = $request->slug;
        $get_course_details = Course::where('slug',$slug)->first();
        $get_course_details_id = $get_course_details->id;

        $get_semesters = Semester::where('course_id',$get_course_details_id)->get();
        $get_fees = FeePlan::where('course_id',$get_course_details_id)->get();
        
        return response()->json(['get_course_details'=>$get_course_details,
        'get_semesters'=>$get_semesters,
        'get_fees'=>$get_fees]);
    }

    public function course_leads(Request $request){

        $name = $request->name;
        $email = $request->email;
        $mobile_no = $request->mobile_no;
        $query = $request->get('query');
        $course_id = $request->course_id;
        $utm_source = $request->utm_source;
        $utm_medium = $request->utm_medium;
        $utm_campaign = $request->utm_campaign;
        $utm_term = $request->utm_term;
        $utm_content = $request->utm_content;

        $ip = $request->ip();

        $create_leads = new CourseLeads;
        $create_leads->name = $name;
        $create_leads->mobile_no = $mobile_no;
        $create_leads->query = $query;
        $create_leads->course_id = $course_id;
        $create_leads->email = $email;
        $create_leads->ip = $ip;
        $create_leads->utm_source = $utm_source;
        $create_leads->utm_medium = $utm_medium;
        $create_leads->utm_campaign = $utm_campaign;
        $create_leads->utm_term = $utm_term;
        $create_leads->utm_content = $utm_content;

        $check_save = $create_leads->save();

        if($check_save){
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'error']);
        }
    }

    public function get_all_courses()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
