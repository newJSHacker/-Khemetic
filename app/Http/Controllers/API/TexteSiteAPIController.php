<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTexteSiteAPIRequest;
use App\Http\Requests\API\UpdateTexteSiteAPIRequest;
use App\Models\TexteSite;
use App\Repositories\TexteSiteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TexteSiteController
 * @package App\Http\Controllers\API
 */

class TexteSiteAPIController extends AppBaseController
{
    /** @var  TexteSiteRepository */
    private $texteSiteRepository;

    public function __construct(TexteSiteRepository $texteSiteRepo)
    {
        $this->texteSiteRepository = $texteSiteRepo;
    }

    /**
     * Display a listing of the TexteSite.
     * GET|HEAD /texteSites
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->texteSiteRepository->pushCriteria(new RequestCriteria($request));
        $this->texteSiteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $texteSites = $this->texteSiteRepository->all();

        return $this->sendResponse($texteSites->toArray(), 'Texte Sites retrieved successfully');
    }

    /**
     * Store a newly created TexteSite in storage.
     * POST /texteSites
     *
     * @param CreateTexteSiteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTexteSiteAPIRequest $request)
    {
        $input = $request->all();

        $texteSites = $this->texteSiteRepository->create($input);

        return $this->sendResponse($texteSites->toArray(), 'Texte Site saved successfully');
    }

    /**
     * Display the specified TexteSite.
     * GET|HEAD /texteSites/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TexteSite $texteSite */
        $texteSite = $this->texteSiteRepository->findWithoutFail($id);

        if (empty($texteSite)) {
            return $this->sendError('Texte Site not found');
        }

        return $this->sendResponse($texteSite->toArray(), 'Texte Site retrieved successfully');
    }

    /**
     * Update the specified TexteSite in storage.
     * PUT/PATCH /texteSites/{id}
     *
     * @param  int $id
     * @param UpdateTexteSiteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTexteSiteAPIRequest $request)
    {
        $input = $request->all();

        /** @var TexteSite $texteSite */
        $texteSite = $this->texteSiteRepository->findWithoutFail($id);

        if (empty($texteSite)) {
            return $this->sendError('Texte Site not found');
        }

        $texteSite = $this->texteSiteRepository->update($input, $id);

        return $this->sendResponse($texteSite->toArray(), 'TexteSite updated successfully');
    }

    /**
     * Remove the specified TexteSite from storage.
     * DELETE /texteSites/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TexteSite $texteSite */
        $texteSite = $this->texteSiteRepository->findWithoutFail($id);

        if (empty($texteSite)) {
            return $this->sendError('Texte Site not found');
        }

        $texteSite->delete();

        return $this->sendResponse($id, 'Texte Site deleted successfully');
    }
}
