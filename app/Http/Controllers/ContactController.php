<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    //dispaly all contact

    public function contacts()
    {
        $contacts = Contact::all();
        return response()->json(
            [
           
                'contacts' => $contacts,
                'message'  => 'Contacts',
                'code'     => 200
            ]
        );  
    }

    //create function 

     public function saveContact(Request $request){
         $contact = new Contact();
         $contact->name = $request->name;
         $contact->email = $request->email;
         $contact->designation = $request->designation;
         $contact->contact_no = $request->contact_no;
         $contact->save();
         return response()->json([
           'message' => 'Contact Created Successfully',
           'code' => 200
        ]);
     }

     //get contact by id 

     public function getContact($id){
        $contact = Contact::find($id);
        return  response()->json($contact);
     }

     //update function

     public function updateContact($id, Request $request){
        $contact = Contact::where("id", $id)->first();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->designation = $request->designation;
        $contact->contact_no = $request->contact_no;
        $contact->save();
        return response()->json([
          'message' => 'Contact Update Successfully',
          'code' => 200
       ]);
     }

     //delete function

     public function deleteContact($id){
         $contact = Contact::find($id);
         if($contact){
             $contact->delete();
            return response()->json([
                'message' => 'Contact Deleted Successfly',
                'code' => 200
                ]);
         }else{
            return response()->json(
                [
                    'message' => "Contact with id:$id dose not exist"
                ]);
         }

     }

}
