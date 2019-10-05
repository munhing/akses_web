<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVehicleActivityRequest;
use App\Http\Requests\UpdateVehicleActivityRequest;
use App\Repositories\VehicleActivityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class VehicleActivityController extends AppBaseController
{
    /** @var  VehicleActivityRepository */
    private $vehicleActivityRepository;

    public function __construct(VehicleActivityRepository $vehicleActivityRepo)
    {
        $this->vehicleActivityRepository = $vehicleActivityRepo;
    }

    /**
     * Display a listing of the VehicleActivity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $vehicleActivities = $this->vehicleActivityRepository->all();

        return view('vehicle_activities.index')
            ->with('vehicleActivities', $vehicleActivities);
    }

    /**
     * Show the form for creating a new VehicleActivity.
     *
     * @return Response
     */
    public function create()
    {
        return view('vehicle_activities.create');
    }

    /**
     * Store a newly created VehicleActivity in storage.
     *
     * @param CreateVehicleActivityRequest $request
     *
     * @return Response
     */
    public function store(CreateVehicleActivityRequest $request)
    {
        $input = $request->all();

        $vehicleActivity = $this->vehicleActivityRepository->create($input);

        Flash::success('Vehicle Activity saved successfully.');

        return redirect(route('vehicleActivities.index'));
    }

    /**
     * Display the specified VehicleActivity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vehicleActivity = $this->vehicleActivityRepository->find($id);

        if (empty($vehicleActivity)) {
            Flash::error('Vehicle Activity not found');

            return redirect(route('vehicleActivities.index'));
        }

        return view('vehicle_activities.show')->with('vehicleActivity', $vehicleActivity);
    }

    /**
     * Show the form for editing the specified VehicleActivity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vehicleActivity = $this->vehicleActivityRepository->find($id);

        if (empty($vehicleActivity)) {
            Flash::error('Vehicle Activity not found');

            return redirect(route('vehicleActivities.index'));
        }

        return view('vehicle_activities.edit')->with('vehicleActivity', $vehicleActivity);
    }

    /**
     * Update the specified VehicleActivity in storage.
     *
     * @param int $id
     * @param UpdateVehicleActivityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehicleActivityRequest $request)
    {
        $vehicleActivity = $this->vehicleActivityRepository->find($id);

        if (empty($vehicleActivity)) {
            Flash::error('Vehicle Activity not found');

            return redirect(route('vehicleActivities.index'));
        }

        $vehicleActivity = $this->vehicleActivityRepository->update($request->all(), $id);

        Flash::success('Vehicle Activity updated successfully.');

        return redirect(route('vehicleActivities.index'));
    }

    /**
     * Remove the specified VehicleActivity from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehicleActivity = $this->vehicleActivityRepository->find($id);

        if (empty($vehicleActivity)) {
            Flash::error('Vehicle Activity not found');

            return redirect(route('vehicleActivities.index'));
        }

        $this->vehicleActivityRepository->delete($id);

        Flash::success('Vehicle Activity deleted successfully.');

        return redirect(route('vehicleActivities.index'));
    }
}
