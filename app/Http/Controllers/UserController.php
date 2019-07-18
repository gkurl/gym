<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use \App\Providers\AppServiceProvider\QuerytoCSV;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        return view('users.create')->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request -> all(),
        [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'address' => 'required|string|max:255',
            'dateofbirth' => 'nullable',
            'contactnumber' => 'nullable',
            'subscription_id' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed'

        ]);

        if($validator -> passes()){

            $request['password'] = bcrypt($request['password']);

            User::create($request -> all());

            return redirect(route('user-index'))->with('message', 'User successfully created.');

        } else {

            return redirect(route('user-index'))->withErrors($validator);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //In admin panel would be more efficient to show user data in the edit view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view ('users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //format date into required format
        $date = $request->dateofbirth;
        $date = strtotime($date);
        $date = date('d/m/Y', $date);


        $validator = Validator::make($request -> all(),
        [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' .$user->id, //to prevent email required error for current user
            'address' => 'required|string|max:255',
            'dateofbirth' => 'nullable',
            'contactnumber' => 'nullable',
            'subscription_id' => 'required|numeric'
        ]);

        if($validator -> passes()){

            $request->subscription_id = (int)$request->subscription_id;

            $user -> update($request -> all());

            return redirect(route('user-edit', $user->id))->with('message', 'User successfully updated.');

        } else {

            return redirect(route('user-edit', $user->id))->withErrors($validator);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user -> delete();

        return redirect(route('user-index'))->with('message', 'User successfully removed.');
    }

    public function reportview() {

        return view('users.report');
    }

    public function generatereport(Request $request) {

        $res = DB::select(
            "CALL monthlyreport(\"$request->reportmonth\")"
        );



        if(count($res)>0) {

            $CsvData = ["Full Name,Email,Address,Contact Number,Subscription"];
            foreach($res as $r) {

                $r=(array)$r;

                $CsvData[]= $r['Full Name'] .','. $r['Email'] .','. $r['Address'] .','. $r['Contact Number'] .','. $r['Subscription']. "\n";
            }

            $filename = $request->reportmonth . ".csv";
            $filepath = base_path().'/'.$filename;
            $file = fopen($filepath, "w+");

            foreach($CsvData as $exp_data) {
                fputcsv($file,explode(',',$exp_data));
            }
            fclose($file);

            $headers = ['Content-Type' => 'application/csv'];
            return response()->download($filepath,$filename,$headers)->deleteFileAfterSend(true);

        }

        return view('users.report')->with('message', 'No date provided or no data present to download   ');

    }
}
