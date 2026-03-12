<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(
        private readonly ContactService $service
    ) {
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(StoreContactRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Contact créé avec succès.');
    }
}
