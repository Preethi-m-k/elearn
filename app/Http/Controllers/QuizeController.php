<?php

namespace App\Http\Controllers;

use App\quize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class QuizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quize = quize::all();
       
        return view('instructor.quize.list', compact('quize'));
        
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
     * @param  \App\quize  $quize
     * @return \Illuminate\Http\Response
     */
    public function show(quize $quize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\quize  $quize
     * @return \Illuminate\Http\Response
     */
    public function edit(quize $quize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\quize  $quize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quize $quize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\quize  $quize
     * @return \Illuminate\Http\Response
     */
    public function destroy(quize $quize)
    {
        //
    }






    //depan
    //adding new questions
    public function add_new_question(Request $request){
    
        $validator = Validator::make($request->all(),[
            'question'=>'required',
            'option_1'=>'required',
            'option_2'=>'required',
            'option_3'=>'required',
            'option_4'=>'required',
            'ans'=>'required'
        ]);

        if($validator->fails()){
            $arr = array('status'=>'flase','message'=>$validator->errors()->all());

        }else{
           
            $q = new quize();
            $q->course_id = $request->course_id;
            $q->exam_id=$request->exam_id;
            $q->questions=$request->question;

            if($request->ans=='option_1'){
                $q->ans=$request->option_1;
            }elseif($request->ans=='option_2'){
                $q->ans=$request->option_2;
            }elseif($request->ans=='option_3'){
                $q->ans=$request->option_3;
            }else{
                $q->ans=$request->option_4;
            }
            


            $q->status=1;
            $q->options=json_encode(array('option1'=>$request->option_1,'option2'=>$request->option_2,'option3'=>$request->option_3,'option4'=>$request->option_4));

            $q->save();

            $return_data = array('status'=>'true','message'=>'successfully added','reload'=>url('admin/add_questions/'.$request->exam_id));
        }
        

        echo json_encode($return_data);
        return Redirect::to('payment/form')->withErrors(['payment_error', true]);


       
    }



    //Edit question status
    public function question_status($id){
        $p = quize::where('id',$id)->get()->first();

        if($p->status==1)
            $status=0;
        else
            $status=1;
        
        $p1 = Oex_question_master::where('id',$id)->get()->first();
        $p1->status=$status;
        $p1->update();
    }
}