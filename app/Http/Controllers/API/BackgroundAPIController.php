<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBackgroundAPIRequest;
use App\Http\Requests\API\UpdateBackgroundAPIRequest;
use App\Models\Background;
use App\Repositories\BackgroundRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BackgroundController
 * @package App\Http\Controllers\API
 */

class BackgroundAPIController extends AppBaseController
{
    /** @var  BackgroundRepository */
    private $backgroundRepository;

    public function __construct(BackgroundRepository $backgroundRepo)
    {
        $this->backgroundRepository = $backgroundRepo;
    }

    /**
     * Display a listing of the Background.
     * GET|HEAD /backgrounds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->backgroundRepository->pushCriteria(new RequestCriteria($request));
        $this->backgroundRepository->pushCriteria(new LimitOffsetCriteria($request));
        $backgrounds = $this->backgroundRepository->all();

        return $this->sendResponse($backgrounds->toArray(), 'Backgrounds retrieved successfully');
    }

    /**
     * Store a newly created Background in storage.
     * POST /backgrounds
     *
     * @param CreateBackgroundAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBackgroundAPIRequest $request)
    {
        $input = $request->all();

        $backgrounds = $this->backgroundRepository->create($input);

        return $this->sendResponse($backgrounds->toArray(), 'Background saved successfully');
    }

    /**
     * Display the specified Background.
     * GET|HEAD /backgrounds/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Background $background */
        $background = $this->backgroundRepository->findWithoutFail($id);

        if (empty($background)) {
            return $this->sendError('Background not found');
        }

        return $this->sendResponse($background->toArray(), 'Background retrieved successfully');
    }

    /**
     * Update the specified Background in storage.
     * PUT/PATCH /backgrounds/{id}
     *
     * @param  int $id
     * @param UpdateBackgroundAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBackgroundAPIRequest $request)
    {
        $input = $request->all();

        /** @var Background $background */
        $background = $this->backgroundRepository->findWithoutFail($id);

        if (empty($background)) {
            return $this->sendError('Background not found');
        }

        $background = $this->backgroundRepository->update($input, $id);

        return $this->sendResponse($background->toArray(), 'Background updated successfully');
    }

    /**
     * Remove the specified Background from storage.
     * DELETE /backgrounds/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Background $background */
        $background = $this->backgroundRepository->findWithoutFail($id);

        if (empty($background)) {
            return $this->sendError('Background not found');
        }

        $background->delete();

        return $this->sendResponse($id, 'Background deleted successfully');
    }
}
