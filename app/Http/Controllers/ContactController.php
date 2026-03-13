<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(
        private readonly ContactService $service
    ) {
    }

    public function index()
    {
        $contacts = $this->service->list(10);

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(StoreContactRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contact créé avec succès.');
    }

    public function edit(int $contact)
    {
        $contact = $this->service->get($contact);

        return view('contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, int $contact)
    {
        $this->service->update($contact, $request->validated());

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contact mis à jour avec succès.');
    }

    public function destroy(int $contact)
    {
        $this->service->delete($contact);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Contact supprimé avec succès.');
    }
}
