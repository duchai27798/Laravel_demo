<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Person[]|Collection
     */
    public function index()
    {
        return Person::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('dialogs.person-editor-dialog', ['person' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        return $this->formValidation($request, new Person())->save() ? ['status' => 'success', 'action' => 'create'] : ['status' => 'failure', 'action' => 'create'];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        return Person::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|Response|View
     */
    public function edit(int $id)
    {
        return view('dialogs.person-editor-dialog', ['person' => Person::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return string[]
     */
    public function update(Request $request, int $id)
    {
        return $this->formValidation($request, Person::find($id))->save() ? ['status' => 'success', 'action' => 'update'] : ['status' => 'failure', 'action' => 'update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string[]
     */
    public function destroy(int $id)
    {
        return Person::find($id)->delete() ? ['status' => 'success', 'action' => 'delete'] : ['status' => 'failure', 'action' => 'delete'];
    }

    /**
     * @param Request $request
     * @param Person $person
     * @return Person
     */
    public function formValidation(Request $request, Person $person)
    {
        $validateData = $request->validate([
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'nickname' => 'required|min:3',
            'hobby' => 'required|min:3',
            'image' => 'required|min:3'
        ]);

        $person->firstname = $request->input('firstname');
        $person->lastname = $request->input('lastname');
        $person->nickname = $request->input('nickname');
        $person->hobby = $request->input('hobby');
        $person->image = $request->input('image');
        $person->gender = $request->input('gender');
        $person->birthday = strtotime($request->input('birthday'));

        return $person;
    }
}
