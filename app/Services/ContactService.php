<?php

namespace App\Services;

use App\Models\Contact;
use App\Repositories\ContactRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ContactService
{
    public function __construct(
        private readonly ContactRepositoryInterface $contacts
    ) {
    }

    public function list(int $perPage = 10): LengthAwarePaginator
    {
        return $this->contacts->paginate($perPage);
    }

    public function get(int $id): Contact
    {
        $contact = $this->contacts->find($id);

        if (! $contact) {
            abort(404, 'Contact non trouvé');
        }

        return $contact;
    }

    public function create(array $data): Contact
    {
        return $this->contacts->create($data);
    }

    public function update(int $id, array $data): Contact
    {
        $contact = $this->get($id);

        return $this->contacts->update($contact, $data);
    }
}
