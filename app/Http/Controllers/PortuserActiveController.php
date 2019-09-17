<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePortuserActiveRequest;
use App\Http\Requests\UpdatePortuserActiveRequest;
use App\Repositories\PortuserActiveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Events\PortuserClockIn;


class PortuserActiveController extends AppBaseController
{
    /** @var  PortuserActiveRepository */
    private $portuserActiveRepository;

    public function __construct(PortuserActiveRepository $portuserActiveRepo)
    {
        $this->portuserActiveRepository = $portuserActiveRepo;
    }

    /**
     * Display a listing of the PortuserActive.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $portusersActive = $this->portuserActiveRepository->all();

        return view('portusers_active.index')
            ->with('portusersActive', $portusersActive);
    }

    /**
     * Show the form for creating a new PortuserActive.
     *
     * @return Response
     */
    public function create()
    {
        return view('portusers_active.create');
    }

    /**
     * Store a newly created PortuserActive in storage.
     *
     * @param CreatePortuserActiveRequest $request
     *
     * @return Response
     */
    // public function store(CreatePortuserActiveRequest $request)
    // {
    //     $input = $request->all();

    //     $portuserActive = $this->portuserActiveRepository->create($input);

    //     Flash::success('Portuser Active saved successfully.');

    //     return redirect(route('portusersActive.index'));
    // }

    public function store(Request $request)
    {
        $input = $request->all();
        PortuserClockIn::dispatch();
        return $input;
    }        

    /**
     * Display the specified PortuserActive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $portuserActive = $this->portuserActiveRepository->find($id);

        if (empty($portuserActive)) {
            Flash::error('Portuser Active not found');

            return redirect(route('portusersActive.index'));
        }

        return view('portusers_active.show')->with('portuserActive', $portuserActive);
    }

    /**
     * Show the form for editing the specified PortuserActive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $portuserActive = $this->portuserActiveRepository->find($id);

        if (empty($portuserActive)) {
            Flash::error('Portuser Active not found');

            return redirect(route('portusersActive.index'));
        }

        return view('portusers_active.edit')->with('portuserActive', $portuserActive);
    }

    /**
     * Update the specified PortuserActive in storage.
     *
     * @param int $id
     * @param UpdatePortuserActiveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePortuserActiveRequest $request)
    {
        $portuserActive = $this->portuserActiveRepository->find($id);

        if (empty($portuserActive)) {
            Flash::error('Portuser Active not found');

            return redirect(route('portusersActive.index'));
        }

        $portuserActive = $this->portuserActiveRepository->update($request->all(), $id);

        Flash::success('Portuser Active updated successfully.');

        return redirect(route('portusersActive.index'));
    }

    /**
     * Remove the specified PortuserActive from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $portuserActive = $this->portuserActiveRepository->find($id);

        if (empty($portuserActive)) {
            Flash::error('Portuser Active not found');

            return redirect(route('portusersActive.index'));
        }

        $this->portuserActiveRepository->delete($id);

        Flash::success('Portuser Active deleted successfully.');

        return redirect(route('portusersActive.index'));
    }
}
