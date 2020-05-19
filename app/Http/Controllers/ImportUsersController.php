<?php

namespace App\Http\Controllers;

use App\Models\User\XlsxImporter;
use Illuminate\Http\Request;

class ImportUsersController extends Controller
{
    public function create()
    {
        return view('import-users.create');
    }

    public function store(Request $request)
    {
        (new XlsxImporter())->importUsers($request->file('users'));
        return response('');
    }
}
