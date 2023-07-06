<?php

namespace App\Interfaces;

interface ContactRepositoryInterface 
{
    public function getAllContacts();
    public function getContactById($contactId);
}