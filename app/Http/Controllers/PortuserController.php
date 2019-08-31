<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePortuserRequest;
use App\Http\Requests\UpdatePortuserRequest;
use App\Repositories\PortuserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PortuserController extends AppBaseController
{
    /** @var  PortuserRepository */
    private $portuserRepository;

    public function __construct(PortuserRepository $portuserRepo)
    {
        $this->portuserRepository = $portuserRepo;
    }

    /**
     * Display a listing of the Portuser.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $portusers = $this->portuserRepository->all();

        return view('portusers.index')
            ->with('portusers', $portusers);
    }

    /**
     * Show the form for creating a new Portuser.
     *
     * @return Response
     */
    public function create()
    {
        return view('portusers.create');
    }

    /**
     * Store a newly created Portuser in storage.
     *
     * @param CreatePortuserRequest $request
     *
     * @return Response
     */
    public function store(CreatePortuserRequest $request)
    {
        $input = $request->all();

        $portuser = $this->portuserRepository->create($input);

        Flash::success('Portuser saved successfully.');

        return redirect(route('portusers.index'));
    }

    /**
     * Display the specified Portuser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $portuser = $this->portuserRepository->find($id);

        if (empty($portuser)) {
            Flash::error('Portuser not found');

            return redirect(route('portusers.index'));
        }

        return view('portusers.show')->with('portuser', $portuser);
    }

    /**
     * Show the form for editing the specified Portuser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $portuser = $this->portuserRepository->find($id);

        if (empty($portuser)) {
            Flash::error('Portuser not found');

            return redirect(route('portusers.index'));
        }

        return view('portusers.edit')->with('portuser', $portuser);
    }

    /**
     * Update the specified Portuser in storage.
     *
     * @param int $id
     * @param UpdatePortuserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePortuserRequest $request)
    {
        $portuser = $this->portuserRepository->find($id);

        if (empty($portuser)) {
            Flash::error('Portuser not found');

            return redirect(route('portusers.index'));
        }

        $portuser = $this->portuserRepository->update($request->all(), $id);

        Flash::success('Portuser updated successfully.');

        return redirect(route('portusers.index'));
    }

    /**
     * Remove the specified Portuser from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $portuser = $this->portuserRepository->find($id);

        if (empty($portuser)) {
            Flash::error('Portuser not found');

            return redirect(route('portusers.index'));
        }

        $this->portuserRepository->delete($id);

        Flash::success('Portuser deleted successfully.');

        return redirect(route('portusers.index'));
    }
}
