<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use App\Models\Appiotment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  $appointments = Appiotment::with('user')->where('doctor_id', Auth::guard('doctor')->user()->id)
  ->where('status' , 'pending')->get();
        $totalPatients=Appiotment::count();
        return view('doctor.index',compact('appointments', 'totalPatients'));
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
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        // --------------------------------------------------------------------------function image start----------------------
        //بتجيب الدوكتور وبتجيب كل الركويست وبعدين بتعدلوا 
        $doctor = Doctor::find($id);
        $input = $request->except('image');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $input['image'] = asset('images/'. $imageName);
        }
        // --------------------------------------------------------------------------function image End----------------------

        
        $doctor->update($input);
        return redirect()->route('doctorprofile')->with('success','Doctor profile update successfully');

        
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }



    function loginpagedoctotr(){
        return view('doctor.login');
    }

    // function registerpagedoc()
    // {
    //     return view('doctor.register');
    // }

    function registerpagedoctor(){
        return view('doctor.register');
    }




    function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('doctor')->attempt($credentials)) {
            return redirect()->route('doctorhome');
        }

        return redirect()->route('doctorlogin');
    }




    function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors',
            'password' => 'required|min:8',

        ]);

        $input = $request->except('password');

        $input['password'] = Hash::make($request->password);
        Doctor::create($input);
        return redirect()->route('doctorloginpage')->with('success', 'Doctor registered successfully');
    }


    function profile(){

        //get doctor from session
        $doctor = Auth::guard('doctor')->user();

        return view('doctor.profile' ,compact('doctor'));
    }






  public  function showdoctorprofile($id){
        $doctor = Doctor::find($id);
        return view('doctor.singledoctor' , compact('doctor'));
    }


    function  logout(){
        Auth::guard('doctor')->logout();
        return redirect()->route('home');
    }

}
