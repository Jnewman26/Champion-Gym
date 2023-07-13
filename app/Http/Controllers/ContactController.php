<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function admin()
    {
        $contact = Contact::all();
        return Inertia::render('AdminApp/Contact', [
            'contacts' => $contact
        ]);
    }

    public function contactStore(Request $request)
    {
        // Validasi input data jika diperlukan
        $request->validate([
            'whatsapp' => 'required|numeric',
            'instagram' => 'required|string',
            'facebook' => 'required|string',
        ]);

        if ($request->has('contact_id')) {
            // Ambil data kontak berdasarkan contact_id
            $contact = Contact::find($request->contact_id);

            $date = Carbon::now();

            // Periksa apakah data kontak ditemukan
            if ($contact) {
                $contact->whatsapp = $request->whatsapp;
                $contact->instagram = $request->instagram;
                $contact->facebook = $request->facebook;
                $contact->contact_updated = $date->format('d-m-Y H:i:s');

                $contact->save();
                return Redirect::route('contact-admin')->with('message', 'Contact successfully updated');
            }
        }
    }
}