<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Si vous avez un modèle Contact

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Si vous avez un modèle Contact
        // Contact::create($request->all());

        // Ou envoyez l'email, etc.
        // Mail::to('your-email@example.com')->send(new ContactFormMail($request->all()));

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}
