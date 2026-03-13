<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ContactRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator;


    public function create(array $data): Contact;
}
