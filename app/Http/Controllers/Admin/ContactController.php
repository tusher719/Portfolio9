<?php

namespace App\Http\Controllers\Admin;

use App\contact;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendContact(Request $request)
        {
            $this->validate($request,[
                'name' => 'required|min:3|max:30',
                'email' => 'required|unique:contacts',
                'phone' => 'required|min:11|max:14|regex:/[0-9]/|unique:contacts'
            ]);

            $contact = new contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->save();

            Toastr::success('Your info send Successfully','Success',['closeButton'=>true, 'progressBar'=>true]);
            return redirect()->back();
        }


        public function viewContact()
        {
            $contacts = contact::latest()->paginate(5);
            return view('admin.contact.view-contact',[
                'contacts' => $contacts
            ]);
        }


    public function viewContactDetails($id)
    {
        $contact = contact::find($id);
        return view('admin.contact.view-contact-details',[
            'contact' => $contact
        ]);
    }


    public function deleteContact($id)
        {
            $contact = contact::find($id);
            $contact->delete();

            Toastr::success('client info delete successfully', 'Success', ['closeButton'=>true,'progressBar'=>true]);
            return redirect()->back();
        }
}
