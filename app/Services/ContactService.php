<?php

namespace App\Services;

use App\Models\Contact;
use App\Repositories\ContactRepositoryInterface;

class ContactService
{
    public function __construct(
        private readonly ContactRepositoryInterface $contacts
    ) {
    }

    public function create(array $data): Contact
    {
        return $this->contacts->create($data);
    }
}
