<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVisitorCardRequest;
use App\Http\Requests\UpdateVisitorCardRequest;
use App\Repositories\VisitorCardRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class VisitorCardController extends AppBaseController
{
    /** @var  VisitorCardRepository */
    private $visitorCardRepository;

    public function __construct(VisitorCardRepository $visitorCardRepo)
    {
        $this->visitorCardRepository = $visitorCardRepo;
    }

    /**
     * Display a listing of the VisitorCard.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $visitorCards = $this->visitorCardRepository->all();

        return view('visitor_cards.index')
            ->with('visitorCards', $visitorCards);
    }

    /**
     * Show the form for creating a new VisitorCard.
     *
     * @return Response
     */
    public function create()
    {
        return view('visitor_cards.create');
    }

    /**
     * Store a newly created VisitorCard in storage.
     *
     * @param CreateVisitorCardRequest $request
     *
     * @return Response
     */
    public function store(CreateVisitorCardRequest $request)
    {
        $input = $request->all();

        $visitorCard = $this->visitorCardRepository->create($input);

        Flash::success('Visitor Card saved successfully.');

        return redirect(route('visitorCards.index'));
    }

    /**
     * Display the specified VisitorCard.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $visitorCard = $this->visitorCardRepository->find($id);

        if (empty($visitorCard)) {
            Flash::error('Visitor Card not found');

            return redirect(route('visitorCards.index'));
        }

        return view('visitor_cards.show')->with('visitorCard', $visitorCard);
    }

    /**
     * Show the form for editing the specified VisitorCard.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $visitorCard = $this->visitorCardRepository->find($id);

        if (empty($visitorCard)) {
            Flash::error('Visitor Card not found');

            return redirect(route('visitorCards.index'));
        }

        return view('visitor_cards.edit')->with('visitorCard', $visitorCard);
    }

    /**
     * Update the specified VisitorCard in storage.
     *
     * @param int $id
     * @param UpdateVisitorCardRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisitorCardRequest $request)
    {
        $visitorCard = $this->visitorCardRepository->find($id);

        if (empty($visitorCard)) {
            Flash::error('Visitor Card not found');

            return redirect(route('visitorCards.index'));
        }

        $visitorCard = $this->visitorCardRepository->update($request->all(), $id);

        Flash::success('Visitor Card updated successfully.');

        return redirect(route('visitorCards.index'));
    }

    /**
     * Remove the specified VisitorCard from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $visitorCard = $this->visitorCardRepository->find($id);

        if (empty($visitorCard)) {
            Flash::error('Visitor Card not found');

            return redirect(route('visitorCards.index'));
        }

        $this->visitorCardRepository->delete($id);

        Flash::success('Visitor Card deleted successfully.');

        return redirect(route('visitorCards.index'));
    }
}
