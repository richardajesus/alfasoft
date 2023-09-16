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
}
