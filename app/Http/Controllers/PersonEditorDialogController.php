<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonEditorDialogController extends Controller
{
    public function edit($id)
    {
        return view('dialogs.person-editor-dialog', ['person' => Person::find($id)]);
    }
}
