<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface 
{
    public function getAllContacts() 
    {
        return Contact::all();
    }

    public function getContactById($contactId)
    {
        return Contact::findOrFail($contactId);
    }
}
