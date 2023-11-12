<?php

namespace App\Http\Controllers;

use App\Services\ContactsService;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function index(ContactsService $service): View
    {
        return view('contact')->with('contactsData', $service->getContactsData());
    }
}
