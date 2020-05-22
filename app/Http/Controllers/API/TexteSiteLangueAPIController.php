<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTexteSiteLangueAPIRequest;
use App\Http\Requests\API\UpdateTexteSiteLangueAPIRequest;
use App\Models\TexteSiteLangue;
use App\Repositories\TexteSiteLangueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TexteSiteLangueController
 * @package App\Http\Controllers\API
 */

class TexteSiteLangueAPIController extends AppBaseController
{
    /** @var  TexteSiteLangueRepository */
    private $texteSiteLangueRepository;

    public function __construct(TexteSiteLangueRepository $texteSiteLangueRepo)
    {
        $this->texteSiteLangueRepository = $texteSiteLangueRepo;
    }

    /**
     * Display a listing of the TexteSiteLangue.
     * GET|HEAD /texteSiteLangues
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->texteSiteLangueRepository->pushCriteria(new RequestCriteria($request));
        $this->texteSiteLangueRepository->pushCriteria(new LimitOffsetCriteria($request));
        $texteSiteLangues = $this->texteSiteLangueRepository->all();

        return $this->sendResponse($texteSiteLangues->toArray(), 'Texte Site Langues retrieved successfully');
    }

    /**
     * Store a newly created TexteSiteLangue in storage.
     * POST /texteSiteLangues
     *
     * @param CreateTexteSiteLangueAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTexteSiteLangueAPIRequest $request)
    {
        $input = $request->all();

        $texteSiteLangues = $this->texteSiteLangueRepository->create($input);

        return $this->sendResponse($texteSiteLangues->toArray(), 'Texte Site Langue saved successfully');
    }

    /**
     * Display the specified TexteSiteLangue.
     * GET|HEAD /texteSiteLangues/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TexteSiteLangue $texteSiteLangue */
        $texteSiteLangue = $this->texteSiteLangueRepository->findWithoutFail($id);

        if (empty($texteSiteLangue)) {
            return $this->sendError('Texte Site Langue not found');
        }

        return $this->sendResponse($texteSiteLangue->toArray(), 'Texte Site Langue retrieved successfully');
    }

    /**
     * Update the specified TexteSiteLangue in storage.
     * PUT/PATCH /texteSiteLangues/{id}
     *
     * @param  int $id
     * @param UpdateTexteSiteLangueAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTexteSiteLangueAPIRequest $request)
    {
        $input = $request->all();

        /** @var TexteSiteLangue $texteSiteLangue */
        $texteSiteLangue = $this->texteSiteLangueRepository->findWithoutFail($id);

        if (empty($texteSiteLangue)) {
            return $this->sendError('Texte Site Langue not found');
        }

        $texteSiteLangue = $this->texteSiteLangueRepository->update($input, $id);

        return $this->sendResponse($texteSiteLangue->toArray(), 'TexteSiteLangue updated successfully');
    }

    /**
     * Remove the specified TexteSiteLangue from storage.
     * DELETE /texteSiteLangues/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TexteSiteLangue $texteSiteLangue */
        $texteSiteLangue = $this->texteSiteLangueRepository->findWithoutFail($id);

        if (empty($texteSiteLangue)) {
            return $this->sendError('Texte Site Langue not found');
        }

        $texteSiteLangue->delete();

        return $this->sendResponse($id, 'Texte Site Langue deleted successfully');
    }
}
