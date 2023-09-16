<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        usleep(300000); // purposely delay
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

    public function show(Contact $contact)
    {

        return view('contact.show', ['contact' => $contact, 'imgUser' => $this->getProfilePicture()]);
    }

    public function store(ContactRequest $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->email = $request->email;
        $contact->save();
        return redirect()->route('contact.show', ['contact' => $contact->id]);
    }

    public function edit(Contact $contact)
    {
        return view('contact.edit', ['contact' => $contact, 'imgUser' => $this->getProfilePicture()]);
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->email = $request->email;
        $contact->save();
        return redirect()->route('contact.show', $contact->id);
    }

    private function getProfilePicture()
    {
        $gender = rand(0, 1) ? 'men' : 'women';
        $id = mt_rand(1, 99);
        return "//randomuser.me/api/portraits/$gender/$id.jpg";
    }
}
