<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSocialAPIRequest;
use App\Http\Requests\API\UpdateSocialAPIRequest;
use App\Models\Social;
use App\Repositories\SocialRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SocialController
 * @package App\Http\Controllers\API
 */

class SocialAPIController extends AppBaseController
{
    /** @var  SocialRepository */
    private $socialRepository;

    public function __construct(SocialRepository $socialRepo)
    {
        $this->socialRepository = $socialRepo;
    }

    /**
     * Display a listing of the Social.
     * GET|HEAD /socials
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->socialRepository->pushCriteria(new RequestCriteria($request));
        $this->socialRepository->pushCriteria(new LimitOffsetCriteria($request));
        $socials = $this->socialRepository->all();

        return $this->sendResponse($socials->toArray(), 'Socials retrieved successfully');
    }

    /**
     * Store a newly created Social in storage.
     * POST /socials
     *
     * @param CreateSocialAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSocialAPIRequest $request)
    {
        $input = $request->all();

        $socials = $this->socialRepository->create($input);

        return $this->sendResponse($socials->toArray(), 'Social saved successfully');
    }

    /**
     * Display the specified Social.
     * GET|HEAD /socials/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Social $social */
        $social = $this->socialRepository->findWithoutFail($id);

        if (empty($social)) {
            return $this->sendError('Social not found');
        }

        return $this->sendResponse($social->toArray(), 'Social retrieved successfully');
    }

    /**
     * Update the specified Social in storage.
     * PUT/PATCH /socials/{id}
     *
     * @param  int $id
     * @param UpdateSocialAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSocialAPIRequest $request)
    {
        $input = $request->all();

        /** @var Social $social */
        $social = $this->socialRepository->findWithoutFail($id);

        if (empty($social)) {
            return $this->sendError('Social not found');
        }

        $social = $this->socialRepository->update($input, $id);

        return $this->sendResponse($social->toArray(), 'Social updated successfully');
    }

    /**
     * Remove the specified Social from storage.
     * DELETE /socials/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Social $social */
        $social = $this->socialRepository->findWithoutFail($id);

        if (empty($social)) {
            return $this->sendError('Social not found');
        }

        $social->delete();

        return $this->sendResponse($id, 'Social deleted successfully');
    }
}
