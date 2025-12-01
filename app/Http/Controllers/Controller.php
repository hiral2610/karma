<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required',
    ]);

    $contact = Contact::create($validated);

    return response()->json([
        'status' => true,
        'message' => 'Contact submitted successfully'
    ]);
}

}
