<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActiveVisitorRequest;
use App\Http\Requests\UpdateActiveVisitorRequest;
use App\Repositories\ActiveVisitorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ActiveVisitorController extends AppBaseController
{
    /** @var  ActiveVisitorRepository */
    private $activeVisitorRepository;

    public function __construct(ActiveVisitorRepository $activeVisitorRepo)
    {
        $this->activeVisitorRepository = $activeVisitorRepo;
    }

    /**
     * Display a listing of the ActiveVisitor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $activeVisitors = $this->activeVisitorRepository->all();

        return view('active_visitors.index')
            ->with('activeVisitors', $activeVisitors);
    }

    /**
     * Show the form for creating a new ActiveVisitor.
     *
     * @return Response
     */
    public function create()
    {
        return view('active_visitors.create');
    }

    /**
     * Store a newly created ActiveVisitor in storage.
     *
     * @param CreateActiveVisitorRequest $request
     *
     * @return Response
     */
    public function store(CreateActiveVisitorRequest $request)
    {
        $input = $request->all();

        $activeVisitor = $this->activeVisitorRepository->create($input);

        Flash::success('Active Visitor saved successfully.');

        return redirect(route('activeVisitors.index'));
    }

    /**
     * Display the specified ActiveVisitor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activeVisitor = $this->activeVisitorRepository->find($id);

        if (empty($activeVisitor)) {
            Flash::error('Active Visitor not found');

            return redirect(route('activeVisitors.index'));
        }

        return view('active_visitors.show')->with('activeVisitor', $activeVisitor);
    }

    /**
     * Show the form for editing the specified ActiveVisitor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activeVisitor = $this->activeVisitorRepository->find($id);

        if (empty($activeVisitor)) {
            Flash::error('Active Visitor not found');

            return redirect(route('activeVisitors.index'));
        }

        return view('active_visitors.edit')->with('activeVisitor', $activeVisitor);
    }

    /**
     * Update the specified ActiveVisitor in storage.
     *
     * @param int $id
     * @param UpdateActiveVisitorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActiveVisitorRequest $request)
    {
        $activeVisitor = $this->activeVisitorRepository->find($id);

        if (empty($activeVisitor)) {
            Flash::error('Active Visitor not found');

            return redirect(route('activeVisitors.index'));
        }

        $activeVisitor = $this->activeVisitorRepository->update($request->all(), $id);

        Flash::success('Active Visitor updated successfully.');

        return redirect(route('activeVisitors.index'));
    }

    /**
     * Remove the specified ActiveVisitor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activeVisitor = $this->activeVisitorRepository->find($id);

        if (empty($activeVisitor)) {
            Flash::error('Active Visitor not found');

            return redirect(route('activeVisitors.index'));
        }

        $this->activeVisitorRepository->delete($id);

        Flash::success('Active Visitor deleted successfully.');

        return redirect(route('activeVisitors.index'));
    }
}
