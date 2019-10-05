<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVisitorActivityRequest;
use App\Http\Requests\UpdateVisitorActivityRequest;
use App\Repositories\VisitorActivityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class VisitorActivityController extends AppBaseController
{
    /** @var  VisitorActivityRepository */
    private $visitorActivityRepository;

    public function __construct(VisitorActivityRepository $visitorActivityRepo)
    {
        $this->visitorActivityRepository = $visitorActivityRepo;
    }

    /**
     * Display a listing of the VisitorActivity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $visitorActivities = $this->visitorActivityRepository->all();

        return view('visitor_activities.index')
            ->with('visitorActivities', $visitorActivities);
    }

    /**
     * Show the form for creating a new VisitorActivity.
     *
     * @return Response
     */
    public function create()
    {
        return view('visitor_activities.create');
    }

    /**
     * Store a newly created VisitorActivity in storage.
     *
     * @param CreateVisitorActivityRequest $request
     *
     * @return Response
     */
    public function store(CreateVisitorActivityRequest $request)
    {
        $input = $request->all();

        $visitorActivity = $this->visitorActivityRepository->create($input);

        Flash::success('Visitor Activity saved successfully.');

        return redirect(route('visitorActivities.index'));
    }

    /**
     * Display the specified VisitorActivity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $visitorActivity = $this->visitorActivityRepository->find($id);

        if (empty($visitorActivity)) {
            Flash::error('Visitor Activity not found');

            return redirect(route('visitorActivities.index'));
        }

        return view('visitor_activities.show')->with('visitorActivity', $visitorActivity);
    }

    /**
     * Show the form for editing the specified VisitorActivity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $visitorActivity = $this->visitorActivityRepository->find($id);

        if (empty($visitorActivity)) {
            Flash::error('Visitor Activity not found');

            return redirect(route('visitorActivities.index'));
        }

        return view('visitor_activities.edit')->with('visitorActivity', $visitorActivity);
    }

    /**
     * Update the specified VisitorActivity in storage.
     *
     * @param int $id
     * @param UpdateVisitorActivityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisitorActivityRequest $request)
    {
        $visitorActivity = $this->visitorActivityRepository->find($id);

        if (empty($visitorActivity)) {
            Flash::error('Visitor Activity not found');

            return redirect(route('visitorActivities.index'));
        }

        $visitorActivity = $this->visitorActivityRepository->update($request->all(), $id);

        Flash::success('Visitor Activity updated successfully.');

        return redirect(route('visitorActivities.index'));
    }

    /**
     * Remove the specified VisitorActivity from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $visitorActivity = $this->visitorActivityRepository->find($id);

        if (empty($visitorActivity)) {
            Flash::error('Visitor Activity not found');

            return redirect(route('visitorActivities.index'));
        }

        $this->visitorActivityRepository->delete($id);

        Flash::success('Visitor Activity deleted successfully.');

        return redirect(route('visitorActivities.index'));
    }
}
