<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActivePortuserRequest;
use App\Http\Requests\UpdateActivePortuserRequest;
use App\Repositories\ActivePortuserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Events\PortuserClockIn;


class ActivePortuserController extends AppBaseController
{
    /** @var  ActivePortuserRepository */
    private $activePortuserRepository;

    public function __construct(ActivePortuserRepository $activePortuserRepo)
    {
        $this->activePortuserRepository = $activePortuserRepo;
    }

    /**
     * Display a listing of the ActivePortuser.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $activePortusers = $this->activePortuserRepository->all();

        return view('active_portusers.index')
            ->with('activePortusers', $activePortusers);
    }

    /**
     * Show the form for creating a new ActivePortuser.
     *
     * @return Response
     */
    public function create()
    {
        return view('active_portusers.create');
    }

    /**
     * Store a newly created ActivePortuser in storage.
     *
     * @param CreateActivePortuserRequest $request
     *
     * @return Response
     */
    // public function store(CreateActivePortuserRequest $request)
    // {
    //     $input = $request->all();

    //     $activePortuser = $this->activePortuserRepository->create($input);

    //     Flash::success('Portuser Active saved successfully.');

    //     return redirect(route('activePortusers.index'));
    // }

    public function store(Request $request)
    {
        $input = $request->all();
        PortuserClockIn::dispatch();
        return $input;
    }        

    /**
     * Display the specified ActivePortuser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activePortuser = $this->activePortuserRepository->find($id);

        if (empty($activePortuser)) {
            Flash::error('Portuser Active not found');

            return redirect(route('activePortusers.index'));
        }

        return view('active_portusers.show')->with('activePortuser', $activePortuser);
    }

    /**
     * Show the form for editing the specified ActivePortuser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activePortuser = $this->activePortuserRepository->find($id);

        if (empty($activePortuser)) {
            Flash::error('Portuser Active not found');

            return redirect(route('activePortusers.index'));
        }

        return view('active_portusers.edit')->with('activePortuser', $activePortuser);
    }

    /**
     * Update the specified ActivePortuser in storage.
     *
     * @param int $id
     * @param UpdateActivePortuserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivePortuserRequest $request)
    {
        $activePortuser = $this->activePortuserRepository->find($id);

        if (empty($activePortuser)) {
            Flash::error('Portuser Active not found');

            return redirect(route('activePortusers.index'));
        }

        $activePortuser = $this->activePortuserRepository->update($request->all(), $id);

        Flash::success('Portuser Active updated successfully.');

        return redirect(route('activePortusers.index'));
    }

    /**
     * Remove the specified activePortuser from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activePortuser = $this->activePortuserRepository->find($id);

        if (empty($activePortuser)) {
            Flash::error('Portuser Active not found');

            return redirect(route('activePortusers.index'));
        }

        $this->activePortuserRepository->delete($id);

        Flash::success('Portuser Active deleted successfully.');

        return redirect(route('activePortusers.index'));
    }
}
