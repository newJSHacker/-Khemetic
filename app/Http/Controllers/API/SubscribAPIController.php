<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubscribAPIRequest;
use App\Http\Requests\API\UpdateSubscribAPIRequest;
use App\Models\Subscrib;
use App\Repositories\SubscribRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SubscribController
 * @package App\Http\Controllers\API
 */

class SubscribAPIController extends AppBaseController
{
    /** @var  SubscribRepository */
    private $subscribRepository;

    public function __construct(SubscribRepository $subscribRepo)
    {
        $this->subscribRepository = $subscribRepo;
    }

    /**
     * Display a listing of the Subscrib.
     * GET|HEAD /subscribs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subscribRepository->pushCriteria(new RequestCriteria($request));
        $this->subscribRepository->pushCriteria(new LimitOffsetCriteria($request));
        $subscribs = $this->subscribRepository->all();

        return $this->sendResponse($subscribs->toArray(), 'Subscribs retrieved successfully');
    }

    /**
     * Store a newly created Subscrib in storage.
     * POST /subscribs
     *
     * @param CreateSubscribAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubscribAPIRequest $request)
    {
        $input = $request->all();

        $subscribs = $this->subscribRepository->create($input);

        return $this->sendResponse($subscribs->toArray(), 'Subscrib saved successfully');
    }

    /**
     * Display the specified Subscrib.
     * GET|HEAD /subscribs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Subscrib $subscrib */
        $subscrib = $this->subscribRepository->findWithoutFail($id);

        if (empty($subscrib)) {
            return $this->sendError('Subscrib not found');
        }

        return $this->sendResponse($subscrib->toArray(), 'Subscrib retrieved successfully');
    }

    /**
     * Update the specified Subscrib in storage.
     * PUT/PATCH /subscribs/{id}
     *
     * @param  int $id
     * @param UpdateSubscribAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubscribAPIRequest $request)
    {
        $input = $request->all();

        /** @var Subscrib $subscrib */
        $subscrib = $this->subscribRepository->findWithoutFail($id);

        if (empty($subscrib)) {
            return $this->sendError('Subscrib not found');
        }

        $subscrib = $this->subscribRepository->update($input, $id);

        return $this->sendResponse($subscrib->toArray(), 'Subscrib updated successfully');
    }

    /**
     * Remove the specified Subscrib from storage.
     * DELETE /subscribs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Subscrib $subscrib */
        $subscrib = $this->subscribRepository->findWithoutFail($id);

        if (empty($subscrib)) {
            return $this->sendError('Subscrib not found');
        }

        $subscrib->delete();

        return $this->sendResponse($id, 'Subscrib deleted successfully');
    }
}
