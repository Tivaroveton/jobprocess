<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AdminInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('admin.index');
        $jobs = Job::latest()->paginate(20);
        return view('admin.index',compact('jobs'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list=DB::table('provinces')->get();
        $listtwo=DB::table('amphures')->get();       
        return view('admin.create')->with('list',$list)->with('listtwo',$listtwo);
    }

    public function fetch(Request $request){

        $id=$request->get('select');        
        $result=array();
        $query=DB::table('provinces')
        ->join('amphures','provinces.id','=','amphures.province_id')
        ->select('amphures.code', 'amphures.name_th')
        ->where('provinces.code',$id)
        ->groupBy('amphures.name_th')
        ->get();
        $output='<option value="">เลือกอำเภอ</option>';
        foreach ($query as $row){
            $output.='<option value="'.$row->code.'">'.$row->name_th.'</option>';
        }
        echo $output;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd($request->all());
        //$sdate = $request->get('startdate');
        //$sdate = Carbon::createFromFormat('m/d/Y', $sdate)->format('Y-m-d');
        //dd($sdate);
        

        $this->validate($request,[
            'jobcode'=>'required',
            'projectname'=>'required',
            'province'=>'required',
            'amphures'=>'required',            
            'obj_id'=>'required'
            /**'image'=>'required|mimes:jpeg,jpg,png'**/
        ]);
        /**if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');

'startdate'=>$request->get('startdate'),

            **/
            Job::create([
                /*'slug'=>str_slug($title),*/
                'jobcode'=>$jobcode=$request->get('jobcode'),                
                'reportcode'=>$request->get('reportcode'),  
                'projectname'=>$request->get('projectname'),
                'startdate'=>$request->get('startdate'),             
                'inspectiondate'=>$request->get('inspectiondate'),
                'lcduedate'=>$request->get('lcduedate'),
                'jobsize'=>$request->get('jobsize'),
                'easydiff'=>$request->get('easydiff'),
                'jobtype'=>$request->get('jobtype'),
                'client'=>$request->get('client'),
                'prop_size'=>$request->get('prop_size'),
                'proplocation'=>$request->get('proplocation'),
                'province_id'=>$request->get('province'),
                'amphure_id'=>$request->get('amphures'),   
                'district'=>$request->get('district'),
                'customer'=>$request->get('customer'),
                'prop_type'=>$request->get('prop_type'),
                'obj_id'=>$request->get('obj_id'),               
                'valuationfee'=>$request->get('valuationfee'),
                'valuationfee_case'=>$request->get('valuationfee_case'),
            ]);
        /**}*/
        //return redirect('/admininput')->with('message','Post created successfully');
          
        return redirect('/dashboard')->with('message','Post created successfully');  
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
    public function edit($id){
        $list=DB::table('provinces')->get(); 
        $listtwo=DB::table('amphures')->get();              
        $job = Job::find($id);
        $listthree=DB::table('jobs_img')->get();
        return view('admin.edit',compact('job'))->with('list',$list)->with('listtwo',$listtwo)->with('listthree',$listthree);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request){
        
        //dd($request->get('reportcode') . ' : ' . $request->get('landsize'));
        $this->validate($request,[
            'jobcode'=>'required',            
            'province_id'=>'required',
            'amphure_id'=>'required',           
            'obj_id'=>'required'
        ]);
        //$date = Carbon::createFromFormat('d-m-Y', $request->startdate)->toDateString();
        /**if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');**/
            //dd($request->get('jobsize'));
            //from Job Class
            Job::where('id',$id)->update([
                'jobcode'=>$request->get('jobcode'),
                'reportcode'=>$request->get('reportcode'),  
                'projectname'=>$request->get('projectname'),  
                'client'=>$request->get('client'),
                'customer'=>$request->get('customer'),
                'prop_type'=>$request->get('prop_type'),
                'prop_size'=>$request->get('prop_size'),
                'proplocation'=>$request->get('proplocation'),
                'province_id'=>$request->get('province_id'),
                'amphure_id'=>$request->get('amphure_id'),   
                'district'=>$request->get('district'),           
                'obj_id'=>$request->get('obj_id'),
                'jobsize'=>$request->get('jobsize'),
                'easydiff'=>$request->get('easydiff'),
                'valuationfee'=>$request->get('valuationfee'),
                'valuationfee_case'=>$request->get('valuationfee_case'),
                'jobtype'=>$request->get('jobtype'),
                'startdate'=>$request->get('startdate'),
                'inspectiondate'=>$request->get('inspectiondate'),
                'lcduedate'=>$request->get('lcduedate'),
                'clientduedate'=>$request->get('clientduedate')
            ]);
        //}

        //$this->updateAllExceptImage($request,$id);
        //return redirect()->back()->with('message','Post updated successfully');
        return redirect('/dashboard')->with('message','Post created successfully');      
    }



    public function update2($id,Request $request){
        
        //dd($request->get('reportcode') . ' : ' . $request->get('landsize'));
       
        Job::where('id',$id)->update([           
            'landsize'=>$request->get('landsize'),
            'units'=>$request->get('units'),
            'percentsell'=>$request->get('percentsell'),
            'startprice'=>$request->get('startprice'),
            'roomtype'=>$request->get('roomtype'), 
            'convenient'=>$request->get('convenient'), 
            'broker'=>$request->get('broker'), 
            'yearstart'=>$request->get('yearstart'), 
            'buildingprogress'=>$request->get('buildingprogress'), 
            'lat'=>$request->get('lat'),
            'lng'=>$request->get('lng'),
            'inforesource'=>$request->get('inforesource'),
            'assessmentvalue'=>$request->get('assessmentvalue'),
            'marketvalue'=>$request->get('marketvalue')]);
        
        return redirect('/dashboard')->with('message','Post created successfully');      
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $job = Job::find($id);        
        $job->delete();
        return redirect()->back()->with('message','Post deleted successfully');
    }
    

    public function trash(){
        $jobs = Job::onlyTrashed()->paginate(20);
        return view('admin.trash',compact('jobs'));
    }

    public function restore($id){
        Job::onlyTrashed()->where('id',$id)->restore();
        return redirect()->back()->with('message','Post restored successfully');

    }

    public static function gennewbfid() {
        $prefix = "LC/63BF-"; 
        $id = $prefix; 
        $id = IdGenerator::generate(['table' => 'jobs', 'field'=>'jobcode', 'length' => 12, 'prefix' =>$prefix, 'reset_on_prefix_change' => true]);
        //dd($id);
        return $id;
    }

   
   public static function gennewrid() {
        $prefix = "LC/63R-"; 
        $id = $prefix; 
        $id = IdGenerator::generate(['table' => 'jobs', 'field'=>'jobcode', 'length' => 11, 'prefix' =>$prefix, 'reset_on_prefix_change' => true]);
        //dd($id);
        return $id;
    }

    public function updateprogress(Request $request)
    {
        $id = $request->get('id');
        $mypercent = $request->get('mypercent');
        //dd($mypercent);

        Job::where('id',$id)->update([
                'percentfinish'=>$mypercent          
            ]);
        return redirect('/dashboard')->with('message','Update % progress successfully'); 
    }

}
