<?php

namespace App\Http\Controllers;

use App\Http\Resources\peopleResource;
use App\Models\people;
use Illuminate\Http\Request;

class peopleController extends Controller
{
    public function index()
    {
        return peopleResource::collection(people::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'companies_id' => ['required', 'exists:companies'],
            'type' => ['required'],
            'name' => ['required'],
            'mobile' => ['required'],
            'email' => ['required', 'email', 'max:254'],
        ]);

        return new peopleResource(people::create($data));
    }

    public function show(people $people)
    {
        return new peopleResource($people);
    }

    public function update(Request $request, people $people)
    {
        $data = $request->validate([
            'companies_id' => ['required', 'exists:companies'],
            'type' => ['required'],
            'name' => ['required'],
            'mobile' => ['required'],
            'email' => ['required', 'email', 'max:254'],
        ]);

        $people->update($data);

        return new peopleResource($people);
    }

    public function destroy(people $people)
    {
        $people->delete();

        return response()->json();
    }
}
