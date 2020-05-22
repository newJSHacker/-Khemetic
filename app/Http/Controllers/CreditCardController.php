<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCreditCardRequest;
use App\Http\Requests\UpdateCreditCardRequest;
use App\Repositories\CreditCardRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CreditCardController extends AppBaseController
{
    /** @var  CreditCardRepository */
    private $creditCardRepository;

    public function __construct(CreditCardRepository $creditCardRepo)
    {
        $this->creditCardRepository = $creditCardRepo;
    }

    /**
     * Display a listing of the CreditCard.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->creditCardRepository->pushCriteria(new RequestCriteria($request));
        $creditCards = $this->creditCardRepository->all();

        return view('credit_cards.index')
            ->with('creditCards', $creditCards);
    }

    /**
     * Show the form for creating a new CreditCard.
     *
     * @return Response
     */
    public function create()
    {
        return view('credit_cards.create');
    }

    /**
     * Store a newly created CreditCard in storage.
     *
     * @param CreateCreditCardRequest $request
     *
     * @return Response
     */
    public function store(CreateCreditCardRequest $request)
    {
        $input = $request->all();

        $creditCard = $this->creditCardRepository->create($input);

        Flash::success('Credit Card saved successfully.');

        return redirect(route('creditCards.index'));
    }

    /**
     * Display the specified CreditCard.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $creditCard = $this->creditCardRepository->findWithoutFail($id);

        if (empty($creditCard)) {
            Flash::error('Credit Card not found');

            return redirect(route('creditCards.index'));
        }

        return view('credit_cards.show')->with('creditCard', $creditCard);
    }

    /**
     * Show the form for editing the specified CreditCard.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $creditCard = $this->creditCardRepository->findWithoutFail($id);

        if (empty($creditCard)) {
            Flash::error('Credit Card not found');

            return redirect(route('creditCards.index'));
        }

        return view('credit_cards.edit')->with('creditCard', $creditCard);
    }

    /**
     * Update the specified CreditCard in storage.
     *
     * @param  int              $id
     * @param UpdateCreditCardRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCreditCardRequest $request)
    {
        $creditCard = $this->creditCardRepository->findWithoutFail($id);

        if (empty($creditCard)) {
            Flash::error('Credit Card not found');

            return redirect(route('creditCards.index'));
        }

        $creditCard = $this->creditCardRepository->update($request->all(), $id);

        Flash::success('Credit Card updated successfully.');

        return redirect(route('creditCards.index'));
    }

    /**
     * Remove the specified CreditCard from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $creditCard = $this->creditCardRepository->findWithoutFail($id);

        if (empty($creditCard)) {
            Flash::error('Credit Card not found');

            return redirect(route('creditCards.index'));
        }

        $this->creditCardRepository->delete($id);

        Flash::success('Credit Card deleted successfully.');

        return redirect(route('creditCards.index'));
    }
}
