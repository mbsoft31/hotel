<?php

namespace App\Http\Controllers;

use App\Models\Receptionist;
use App\Models\User;
use Booking\Interfaces\Receptionist\CreateReceptionist;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(): View|Factory|Response|Application
    {
        $receptionists = Receptionist::all();
        return view("admin.receptionist.index", [
            "receptionists" => $receptionists,
        ]);
    }

    /**
     * @codeCoverageIgnore
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $users = User::all();
        return view("admin.receptionist.create", [
            "users" => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request, CreateReceptionist $creator): RedirectResponse
    {
        $inputs = $request->all();
        if ( ! $request->has("existing_user") ) $inputs["existing_user"] = false;
        $receptionist = $creator->create($inputs);
        return redirect()->route("admin.receptionist.index");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $receptionist = Receptionist::findOrFail($id);
        return response('show receptionist ' . $receptionist->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function edit(int $id)
    {
        $receptionist = Receptionist::findOrFail($id);
        return view("admin.receptionist.edit", compact("receptionist"));
    }

    /**
     * @codeCoverageIgnore
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $deleted = Receptionist::findOrFail($id)->delete();
        return redirect()->route("admin.receptionist.index");
    }
}
