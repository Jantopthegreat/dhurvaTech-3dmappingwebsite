<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminContactController extends Controller
{
    public function index(): View
    {
        $contacts = Contact::query()->latest()->paginate(10)->withQueryString();

        return view('admin.contact.index', compact('contacts'));
    }

    public function create(): View|RedirectResponse
    {
        $contact = Contact::query()->latest('id')->first();

        if ($contact !== null) {
            return redirect()->route('admin.contact.edit', $contact);
        }

        return view('admin.contact.create');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        $existingContact = Contact::query()->latest('id')->first();

        if ($existingContact !== null) {
            return redirect()
                ->route('admin.contact.edit', $existingContact)
                ->with('status', 'Data kontak sudah tersedia. Silakan edit data yang ada.');
        }

        $contact = Contact::create($request->validated());

        return redirect()
            ->route('admin.contact.edit', $contact)
            ->with('status', 'Pesan kontak berhasil dibuat.');
    }

    public function edit(Contact $contact): View
    {
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(ContactRequest $request, Contact $contact): RedirectResponse
    {
        $contact->update($request->validated());

        return redirect()
            ->route('admin.contact.edit', $contact)
            ->with('status', 'Pesan kontak berhasil diperbarui.');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()
            ->route('admin.contact.index')
            ->with('status', 'Pesan kontak berhasil dihapus.');
    }
}
