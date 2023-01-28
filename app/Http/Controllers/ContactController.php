<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        sleep(1); // purposely delay
        $sortBy = $request->sortBy ?? 'name';
        $sort = $request->sort ?? 'ASC';
        $contacts = Contact::orderBy($sortBy, $sort);

        $filter = $request->filter;
        $contacts->when($filter, function ($q) use ($filter) {
            $q->where('name', 'like', '%' . $filter . '%');
            $q->orWhere('contact', 'like', '%' . $filter . '%');
            $q->orWhere('email', 'like', '%' . $filter . '%');
        });
        $perPage = $request->per_page ?? 5;
        return response()->json([
            'data'  => $contacts->paginate($perPage)->onEachSide(1),
            'total' => Contact::count(),
        ]);
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.show', ['contact' => $contact]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|min:5',
            'contact'   => 'required|integer|unique:contacts|digits:9',
            'email'     => 'required|unique:contacts|email',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->email = $request->email;
        $contact->save();
        return redirect()->route('contact.show', ['id' => $contact->id]);
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', ['contact' => $contact]);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $request->validate([
            'name'      => 'required|string|min:5',
            'contact'   => 'required|integer|digits:9|unique:contacts,contact,' . $id,
            'email'     => 'required|email|unique:contacts,email,' . $id,
        ]);
        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->email = $request->email;
        $contact->save();
        return redirect()->route('contact.show', $contact->id);
    }

    public function delete($id) {
        $contact = Contact::findOrFail($id);
        return view('contact.delete', ['contact' => $contact]);
    }

    public function destroy($id) {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return view('contact.destroyed', ['contact' => $contact]);
    }
}
