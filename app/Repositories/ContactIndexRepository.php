<?php

namespace App\Repositories;

use App\Interfaces\ContactIndexRepositoryInterface;
use App\Models\ContactIndex;

class ContactIndexRepository implements ContactIndexRepositoryInterface 
{
    public function createContactIndex(array $indexes)
    {
        return ContactIndex::create($indexes);
    }
}
