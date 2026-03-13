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

   

    public function create(array $data): Contact
    {
        return $this->contacts->create($data);
    }
}
