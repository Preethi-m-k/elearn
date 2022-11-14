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
    public function edit(Request $request, $id)
    {
        $q = quize::find($id);
        return view('instructor.quize.edit', compact('q'));

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
    public function question_edit($id){
        $p = quize::where('id',$id)->get()->first();

        if($p->status==1)
            $status=0;
        else
            $status=1;
        
        $p1 = quize::where('id',$id)->get()->first();
        $p1->status=$status;
        $p1->update();
    }

    //Edit question
    public function edit_question_inner(Request $request, $id){

        $q=quize::where('id',$id)->get()->first();

        $q->questions = $request->question;

        if($request->ans=='option_1'){
            $q->ans=$request->option_1;
        }elseif($request->ans=='option_2'){
            $q->ans=$request->option_2;
        }elseif($request->ans=='option_3'){
            $q->ans=$request->option_3;
        }else{
            $q->ans=$request->option_4;
        }

        $q->options = json_encode(array('option1'=>$request->option_1,'option2'=>$request->option_2,'option3'=>$request->option_3,'option4'=>$request->option_4));
        
        $q->update();

        echo json_encode(array('status'=>'true','message'=>'successfully updated','reload'=>url('admin/add_questions/'.$q->exam_id)));

    }

      //Delete questions
      public function delete_question($id){

        $q=quize::where('id',$id)->get()->first();
        $exam_id = $q->exam_id;
        $q->delete();

        return redirect()->back();
    }


       //View Result
       public function view_result($id){

        $data['result_info'] = Oex_result::where('exam_id',$id)->where('user_id',Session::get('id'))->get()->first();
        
        $data['student_info'] = User::where('id',Session::get('id'))->get()->first();

        $data['exam_info']=Oex_exam_master::where('id',$id)->get()->first();

        return view('student.view_result',$data);
}
}