<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActiveVehicleRequest;
use App\Http\Requests\UpdateActiveVehicleRequest;
use App\Repositories\ActiveVehicleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ActiveVehicleController extends AppBaseController
{
    /** @var  ActiveVehicleRepository */
    private $activeVehicleRepository;

    public function __construct(ActiveVehicleRepository $activeVehicleRepo)
    {
        $this->activeVehicleRepository = $activeVehicleRepo;
    }

    /**
     * Display a listing of the ActiveVehicle.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $activeVehicles = $this->activeVehicleRepository->all();

        return view('active_vehicles.index')
            ->with('activeVehicles', $activeVehicles);
    }

    /**
     * Show the form for creating a new ActiveVehicle.
     *
     * @return Response
     */
    public function create()
    {
        return view('active_vehicles.create');
    }

    /**
     * Store a newly created ActiveVehicle in storage.
     *
     * @param CreateActiveVehicleRequest $request
     *
     * @return Response
     */
    public function store(CreateActiveVehicleRequest $request)
    {
        $input = $request->all();

        $activeVehicle = $this->activeVehicleRepository->create($input);

        Flash::success('Active Vehicle saved successfully.');

        return redirect(route('activeVehicles.index'));
    }

    /**
     * Display the specified ActiveVehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activeVehicle = $this->activeVehicleRepository->find($id);

        if (empty($activeVehicle)) {
            Flash::error('Active Vehicle not found');

            return redirect(route('activeVehicles.index'));
        }

        return view('active_vehicles.show')->with('activeVehicle', $activeVehicle);
    }

    /**
     * Show the form for editing the specified ActiveVehicle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activeVehicle = $this->activeVehicleRepository->find($id);

        if (empty($activeVehicle)) {
            Flash::error('Active Vehicle not found');

            return redirect(route('activeVehicles.index'));
        }

        return view('active_vehicles.edit')->with('activeVehicle', $activeVehicle);
    }

    /**
     * Update the specified ActiveVehicle in storage.
     *
     * @param int $id
     * @param UpdateActiveVehicleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActiveVehicleRequest $request)
    {
        $activeVehicle = $this->activeVehicleRepository->find($id);

        if (empty($activeVehicle)) {
            Flash::error('Active Vehicle not found');

            return redirect(route('activeVehicles.index'));
        }

        $activeVehicle = $this->activeVehicleRepository->update($request->all(), $id);

        Flash::success('Active Vehicle updated successfully.');

        return redirect(route('activeVehicles.index'));
    }

    /**
     * Remove the specified ActiveVehicle from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activeVehicle = $this->activeVehicleRepository->find($id);

        if (empty($activeVehicle)) {
            Flash::error('Active Vehicle not found');

            return redirect(route('activeVehicles.index'));
        }

        $this->activeVehicleRepository->delete($id);

        Flash::success('Active Vehicle deleted successfully.');

        return redirect(route('activeVehicles.index'));
    }
}
