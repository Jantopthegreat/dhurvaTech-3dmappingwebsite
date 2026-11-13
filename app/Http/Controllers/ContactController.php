<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $contactSettings = Contact::query()->latest('id')->first();
        $contact = config('jst.contact');

        if ($contactSettings !== null) {
            $contact['whatsapp'] = $contactSettings->no_hp;
            $contact['email'] = $contactSettings->email;
            $contact['address'] = $contactSettings->alamat;
        }

        return view('pages.contact', [
            'contact' => $contact,
            //'contact' => config('cakrawala.contact'),
        ]);
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $contactSettings = Contact::query()->latest('id')->first();
        $phone = preg_replace(
            '/\D+/',
            '',
            (string) ($contactSettings?->no_hp ?: config('jst.contact.whatsapp')),
        );
        $message = implode("\n", [
            'Halo DHURVA TECH ANGKASA RAYA,',
            '',
            'Nama: ' . $data['name'],
            'Email: ' . $data['email'],
            'Nomor WhatsApp: ' . $data['no_hp'],
            'Alamat: ' . $data['alamat'],
            '',
            $data['message'],
        ]);

        return redirect()
            ->away('https://wa.me/' . $phone . '?text=' . rawurlencode($message));
    }
}
