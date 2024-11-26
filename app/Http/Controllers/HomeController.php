<?php

namespace App\Http\Controllers;

use App\Models\Appiotment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $appointments = Appiotment::with('doctor')->where('user_id', Auth::user()->id)->get();

        return view('home',compact('appointments'));
    }


    function profile (){
        $user = Auth::user();
        // dd($user);
        $bloodgroups = ['A-','A+' ,'B-' , 'B+' , 'AB-' , 'AB+' , 'O-' , 'O+'];
    $countries = [
        "United States", "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cairo", "Cambodia", "Cameroon",
        "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France",
        "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and McDonald Islands", "Holy See", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati",
        "Democratic People's Republic of Korea", "Korea", "Kuwait", "Kyrgyzstan", "Lao", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal",
        "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miguelon", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga"
    ];

        return view('patient.profile' , compact('user', 'bloodgroups', 'countries'));

    }



  public  function updateUserprofile(Request $request , $id){
   
    $user = User::find($id);
 
        $input = $request->except('image');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $input['image'] = asset('images/' . $imageName);

        }
     
    $user->update($input);
    return redirect()->route('patientprofile');

}


    public function doctorss()
    {
        $doctors  = Doctor::all();
        return view('patient.doctors', compact('doctors'));
    }


    public function book($id){

         $doctor= Doctor::find($id);
        return view('patient.book', compact('doctor'));
    }


public function appointmentdetails($id){
        $doctor = Doctor::find($id);

    return view('patient.appointmentdetals', compact('doctor'));

}


    public function makeappointment(Request $request){
        // dd($request);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        // dd($input);

        // إنشاء الموعد وحفظ النتيجة في متغير
        $appointment = Appiotment::create($input);


        // تصحيح التوجيه مع إضافة doctor_id
        return redirect()->route('appointmentdetails', ['id' => $request->doctor_id])
        ->with('success',
            'تم حجز الموعد بنجاح'
        );

    }



    public function cancel($id)
    {
       $doctor=  Doctor::find($id);
        $doctor ->delete();
        return redirect()->route('home')->with('success', 'Your success message');

    }
}

