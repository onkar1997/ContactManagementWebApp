<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Auth;

class ContactController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('contacts.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|min:10|numeric',
            'image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/profile_images', $fileNameToStore);
        } else {
            $filenameToStore = 'noimage'.time().'.jpg';
        }

        Contact::create([
            'user_id'=> Auth::user()->id,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'relation' => $request->get('relation'),
            'note' => $request->get('note'),
            'image' => $request->get('image')
        ]);

        return redirect('/dashboard')->with('success', 'Contact Saved');
    }

    public function edit($id) {
        $contact = Contact::findOrFail($id);

        if(auth()->user()->id !== $contact->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        return view('contacts.edit',  compact('contact'));
    }

    public function show() {
        $contacts = Contact::whereUserId(Auth::id())->get();
        return view('/dashboard', compact('contacts'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|min:10|numeric',
            'image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/profile_images', $fileNameToStore);
        }

        $contact = Contact::findOrFail($id);
        $contact->name = request('name');
        $contact->email = request('email');
        $contact->address = request('address');
        $contact->phone = request('phone');
        $contact->relation = request('relation');
        $contact->note = request('note');
        $contact->note = request('image');
        if($request->hasFile('image')) {
            $contact->image = $fileNameToStore;
        }
        $contact->save();

        return redirect()->to('/dashboard')->with('success', 'Contact Updated');
    }

    public function view($id) {
        $contact = Contact::findOrFail($id);

        if(auth()->user()->id !== $contact->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        return view('contacts.view', compact('contact'));
    }

    public function destroy($id) {
        $contact = Contact::findOrFail($id);

        if(auth()->user()->id !== $contact->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        } 
        $contact->delete();

        return redirect()->to('/dashboard')->with('success', 'Contact Deleted');
    }
}
