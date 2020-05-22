<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMediaAssocierAPIRequest;
use App\Http\Requests\API\UpdateMediaAssocierAPIRequest;
use App\Models\MediaAssocier;
use App\Repositories\MediaAssocierRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MediaAssocierController
 * @package App\Http\Controllers\API
 */

class MediaAssocierAPIController extends AppBaseController
{
    /** @var  MediaAssocierRepository */
    private $mediaAssocierRepository;

    public function __construct(MediaAssocierRepository $mediaAssocierRepo)
    {
        $this->mediaAssocierRepository = $mediaAssocierRepo;
    }

    /**
     * Display a listing of the MediaAssocier.
     * GET|HEAD /mediaAssociers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->mediaAssocierRepository->pushCriteria(new RequestCriteria($request));
        $this->mediaAssocierRepository->pushCriteria(new LimitOffsetCriteria($request));
        $mediaAssociers = $this->mediaAssocierRepository->all();

        return $this->sendResponse($mediaAssociers->toArray(), 'Media Associers retrieved successfully');
    }

    /**
     * Store a newly created MediaAssocier in storage.
     * POST /mediaAssociers
     *
     * @param CreateMediaAssocierAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMediaAssocierAPIRequest $request)
    {
        $input = $request->all();

        $mediaAssociers = $this->mediaAssocierRepository->create($input);

        return $this->sendResponse($mediaAssociers->toArray(), 'Media Associer saved successfully');
    }

    /**
     * Display the specified MediaAssocier.
     * GET|HEAD /mediaAssociers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MediaAssocier $mediaAssocier */
        $mediaAssocier = $this->mediaAssocierRepository->findWithoutFail($id);

        if (empty($mediaAssocier)) {
            return $this->sendError('Media Associer not found');
        }

        return $this->sendResponse($mediaAssocier->toArray(), 'Media Associer retrieved successfully');
    }

    /**
     * Update the specified MediaAssocier in storage.
     * PUT/PATCH /mediaAssociers/{id}
     *
     * @param  int $id
     * @param UpdateMediaAssocierAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMediaAssocierAPIRequest $request)
    {
        $input = $request->all();

        /** @var MediaAssocier $mediaAssocier */
        $mediaAssocier = $this->mediaAssocierRepository->findWithoutFail($id);

        if (empty($mediaAssocier)) {
            return $this->sendError('Media Associer not found');
        }

        $mediaAssocier = $this->mediaAssocierRepository->update($input, $id);

        return $this->sendResponse($mediaAssocier->toArray(), 'MediaAssocier updated successfully');
    }

    /**
     * Remove the specified MediaAssocier from storage.
     * DELETE /mediaAssociers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MediaAssocier $mediaAssocier */
        $mediaAssocier = $this->mediaAssocierRepository->findWithoutFail($id);

        if (empty($mediaAssocier)) {
            return $this->sendError('Media Associer not found');
        }

        $mediaAssocier->delete();

        return $this->sendResponse($id, 'Media Associer deleted successfully');
    }
}
