<?php

namespace App\Http\Controllers;

use App\Member;
use App\Division;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {        
        return Division::all(); 
    }

    public function fetchMembers()
    {
         return Member::with('division')->get();
    }

    public function search(Request $request)
    {
        return Member::with('division')
        ->where('firstName', 'like', '%' . $request->search . '%')
        ->orWhere('lastName', 'like', '%' . $request->search . '%') 
        ->get();
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstName'=>'required|string|max:10',
            'lastName'=>'required|string|max:10',
            'dob'=>'required|date',
            'summery'=>'required|string|max:50', 
            'dividion_id'=>'required',      
           
        ]);
         
        try {

            $member = new Member;
            $member->firstName = $request->firstName;
            $member->lastName = $request->lastName;
            $member->dob = $request->dob;
            $member->summery = $request->summery;
            $member->dividion_id = $request->dividion_id;
            $result = $member->save();  
            return response($result,200);

        } catch (Exception $ex) {
            return $ex;
        }

        
    }

    public function update(Request $request)
    {        
        $this->validate($request,[
            'firstName'=>'required|string|max:10',
            'lastName'=>'required|string|max:10',
            'dob'=>'required|date',
            'summery'=>'required|string|max:50', 
            'dividion_id'=>'required',      
           
        ]);
         
        try {

            $member = Member::findOrFail($request->id);
            $member->firstName = $request->firstName;
            $member->lastName = $request->lastName;
            $member->dob = $request->dob;
            $member->summery = $request->summery;
            $member->dividion_id = $request->dividion_id;
            $result = $member->save();  
            return response($result,200);

        } catch (Exception $ex) {
            return $ex;
        }

        
    }

    public function distroy($id)
    {
       try {
        $member = Member::findOrFail($id);
        $result = $member->delete();

        return response($result,200);
       } catch (Exception $ex) {
           return $ex->getMessage();
       }
    }
  
}
