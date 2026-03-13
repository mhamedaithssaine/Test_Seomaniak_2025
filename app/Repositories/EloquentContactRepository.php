<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentContactRepository implements ContactRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return Contact::orderByDesc('created_at')->paginate($perPage);
    }

    public function find(int $id): ?Contact
    {
        return Contact::find($id);
    }

    public function create(array $data): Contact
    {
        return Contact::create($data);
    }

    public function update(Contact $contact, array $data): Contact
    {
        $contact->update($data);

        return $contact;
    }

    public function delete(Contact $contact): void
    {
        $contact->delete();
    }
}
