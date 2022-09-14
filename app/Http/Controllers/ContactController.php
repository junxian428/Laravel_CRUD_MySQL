<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Phone;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $phones = DB::table('phones')->orderBy('id','Desc')->take(5)->get();
 
        return view('contact', ['phones' => $phones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$name = $request->input("phone");
        $name = $request->input("phone");

        $phone = new Phone();        
        $phone->phone_number = $name;
        //$user->timestamps = false;
        $phone->timestamps = false;
        $phone->save();
        $phones = DB::table('phones')->orderBy('id','Desc')->get();
        Session::flash('message', 'Added Successfully!'); 
        Session::flash('alert-class', 'alert-danger'); 
        return view('contact', ['phones' => $phones]);
        // $table->id();
        // $table->string("phone_number");
        //DB::insert('insert into phones (id, phone_number) values (?, ?)', [1, $name]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input("phone");

        $phone = new Phone();        
        $phone->phone_number = $name;
        //$user->timestamps = false;
        $phone->timestamps = false;
        $phone->save();
        $phones = DB::table('phones')->orderBy('id','Desc')->get();
        Session::flash('message', 'Added Successfully!'); 
        Session::flash('alert-class', 'alert-danger'); 
        return view('contact', ['phones' => $phones]);
        //DB::insert('insert into phones (id, phone_number) values (?, ?)', [1, $name]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $name = $request->input("phone");
        //echo $name;
        $possible_phone = DB::table('phones')->get()->where('phone_number', $name);
        //$count = DB::table('phones')->where('phone_number', $name)->count();
        $count = DB::table('phones')->get()->where('phone_number', $name)->count();

        if(is_null($possible_phone)) {
            //echo 'Not Result is returned';
            return view('contact', ['phones' => null]);
        } else{
            //echo $possible_phone;
            Session::flash('message', $count. " record has been found"); 
            Session::flash('alert-class', 'alert-danger'); 
            return view('contact', ['phones' => $possible_phone]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
      
        //return view('edit'), ['phones' => $phones];
    }

    public function GOEdit(Request $request){
        $phone = $request->input('phone');
        //echo $phone;
        $edit_target = DB::table('phones')->get()->where('id', $phone);
        //echo $edit_target;
        return view('edit', ['phones' => $edit_target]);
    }

    public function GOEdit2(Request $request){
        $phoneid = $request->input('phoneid');
        $phonenumber = $request->input('phonenumber');
        $NewPhone = Phone::find($phoneid);
        $NewPhone-> phone_number = $phonenumber;
        //$phone->timestamps = false;
        $NewPhone->timestamps = false;
        $NewPhone ->update();

        return redirect('/contact');




       
    }

    public function filter(Request $request){
        $filter = $request->input('phone');
        //$products = Product::where('name_en', 'LIKE', '%'.$search.'%')->get();
        $filter_result = Phone::where('phone_number','LIKE', '%'.$filter.'%')->get();
        $count = Phone::where('phone_number','LIKE', '%'.$filter.'%')->count();

        if(is_null($filter_result)) {
            //echo 'Not Result is returned';
            return view('contact', ['phones' => null]);
        } else{
            //echo $possible_phone;
            Session::flash('message',   $count. " Similar records have been found which matches the query"); 
            Session::flash('alert-class', 'alert-danger'); 
            return view('contact', ['phones' => $filter_result]);
        }

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
     
    }

    public function delete($id){
        DB::delete('delete from phones where id = ?',[$id]);
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/contact">Click Here</a> to go back.';

    }

    public function Advdelete(Request $request){
        $possible = $request->input('phone');
        //echo $possible;
        DB::delete('delete from phones where phone_number = ?',[$possible]);
        $phones = DB::table('phones')->orderBy('id','Desc')->take(5)->get();
        Session::flash('message', ' Advanced Delete Successfully!'); 
        Session::flash('alert-class', 'alert-danger'); 
        return view('contact', ['phones' => $phones]);

    }
}
