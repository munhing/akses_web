<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePortuserActivityRequest;
use App\Http\Requests\UpdatePortuserActivityRequest;
use App\Repositories\PortuserActivityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PortuserActivityController extends AppBaseController
{
    /** @var  PortuserActivityRepository */
    private $portuserActivityRepository;

    public function __construct(PortuserActivityRepository $portuserActivityRepo)
    {
        $this->portuserActivityRepository = $portuserActivityRepo;
    }

    /**
     * Display a listing of the PortuserActivity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $portuserActivities = $this->portuserActivityRepository->all();

        return view('portuser_activities.index')
            ->with('portuserActivities', $portuserActivities);
    }

    /**
     * Show the form for creating a new PortuserActivity.
     *
     * @return Response
     */
    public function create()
    {
        return view('portuser_activities.create');
    }

    /**
     * Store a newly created PortuserActivity in storage.
     *
     * @param CreatePortuserActivityRequest $request
     *
     * @return Response
     */
    public function store(CreatePortuserActivityRequest $request)
    {
        $input = $request->all();

        $portuserActivity = $this->portuserActivityRepository->create($input);

        Flash::success('Portuser Activity saved successfully.');

        return redirect(route('portuserActivities.index'));
    }

    /**
     * Display the specified PortuserActivity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $portuserActivity = $this->portuserActivityRepository->find($id);

        if (empty($portuserActivity)) {
            Flash::error('Portuser Activity not found');

            return redirect(route('portuserActivities.index'));
        }

        return view('portuser_activities.show')->with('portuserActivity', $portuserActivity);
    }

    /**
     * Show the form for editing the specified PortuserActivity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $portuserActivity = $this->portuserActivityRepository->find($id);

        if (empty($portuserActivity)) {
            Flash::error('Portuser Activity not found');

            return redirect(route('portuserActivities.index'));
        }

        return view('portuser_activities.edit')->with('portuserActivity', $portuserActivity);
    }

    /**
     * Update the specified PortuserActivity in storage.
     *
     * @param int $id
     * @param UpdatePortuserActivityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePortuserActivityRequest $request)
    {
        $portuserActivity = $this->portuserActivityRepository->find($id);

        if (empty($portuserActivity)) {
            Flash::error('Portuser Activity not found');

            return redirect(route('portuserActivities.index'));
        }

        $portuserActivity = $this->portuserActivityRepository->update($request->all(), $id);

        Flash::success('Portuser Activity updated successfully.');

        return redirect(route('portuserActivities.index'));
    }

    /**
     * Remove the specified PortuserActivity from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $portuserActivity = $this->portuserActivityRepository->find($id);

        if (empty($portuserActivity)) {
            Flash::error('Portuser Activity not found');

            return redirect(route('portuserActivities.index'));
        }

        $this->portuserActivityRepository->delete($id);

        Flash::success('Portuser Activity deleted successfully.');

        return redirect(route('portuserActivities.index'));
    }
}
