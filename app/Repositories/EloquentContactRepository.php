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

    

    public function create(array $data): Contact
    {
        return Contact::create($data);
    }
}
