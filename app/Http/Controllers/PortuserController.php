<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePortuserRequest;
use App\Http\Requests\UpdatePortuserRequest;
use App\Repositories\PortuserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Company;
use Flash;
use Response;
use Str;
use QRCode;

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
        $companies = Company::all();
        // dd($companies->id);

        return view('portusers.index', compact('portusers', 'companies'));
    }

    /**
     * Show the form for creating a new Portuser.
     *
     * @return Response
     */
    public function create()
    {
        $uuid = Str::uuid();
        // $companies = Company::all()->makeHidden(['deleted_at', 'created_at', 'updated_at'])->toArray();
        $companies = Company::all()->pluck('name', 'id');

        // dd($uuid);

        // return view('portusers.create', compact('uuid', 'companies'));
        return view('portusers.create', compact('uuid', 'companies'));
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

        // dd($input['photo']);

        $portuser = $this->portuserRepository->create($input);

        

        if (isset($input['photo'])) {
            $portuser->addMediaFromRequest('photo')->toMediaCollection('photos');
        }    

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
     * Display the specified Portuser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function showQrcode($id)
    {
        $portuser = $this->portuserRepository->find($id);

        if (empty($portuser)) {
            Flash::error('Portuser not found');

            return redirect(route('portusers.index'));
        }

        return view('portusers.show_qrcode')->with('portuser', $portuser);
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

        $companies = Company::all()->pluck('name', 'id');

        if (empty($portuser)) {
            Flash::error('Portuser not found');

            return redirect(route('portusers.index'));
        }

        return view('portusers.edit', compact('portuser', 'companies'));
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
        // dd($request);
        $portuser = $this->portuserRepository->find($id);

        if (empty($portuser)) {
            Flash::error('Portuser not found');

            return redirect(route('portusers.index'));
        }

        $input = $request->all();

        $portuser = $this->portuserRepository->update($input, $id);

        // dd($input);

        if (isset($input['photo'])) {
            $portuser->addMediaFromRequest('photo')->toMediaCollection('photos');
        }   
        
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
