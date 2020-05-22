<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContactAdresseAPIRequest;
use App\Http\Requests\API\UpdateContactAdresseAPIRequest;
use App\Models\ContactAdresse;
use App\Repositories\ContactAdresseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ContactAdresseController
 * @package App\Http\Controllers\API
 */

class ContactAdresseAPIController extends AppBaseController
{
    /** @var  ContactAdresseRepository */
    private $contactAdresseRepository;

    public function __construct(ContactAdresseRepository $contactAdresseRepo)
    {
        $this->contactAdresseRepository = $contactAdresseRepo;
    }

    /**
     * Display a listing of the ContactAdresse.
     * GET|HEAD /contactAdresses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contactAdresseRepository->pushCriteria(new RequestCriteria($request));
        $this->contactAdresseRepository->pushCriteria(new LimitOffsetCriteria($request));
        $contactAdresses = $this->contactAdresseRepository->all();

        return $this->sendResponse($contactAdresses->toArray(), 'Contact Adresses retrieved successfully');
    }

    /**
     * Store a newly created ContactAdresse in storage.
     * POST /contactAdresses
     *
     * @param CreateContactAdresseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContactAdresseAPIRequest $request)
    {
        $input = $request->all();

        $contactAdresses = $this->contactAdresseRepository->create($input);

        return $this->sendResponse($contactAdresses->toArray(), 'Contact Adresse saved successfully');
    }

    /**
     * Display the specified ContactAdresse.
     * GET|HEAD /contactAdresses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContactAdresse $contactAdresse */
        $contactAdresse = $this->contactAdresseRepository->findWithoutFail($id);

        if (empty($contactAdresse)) {
            return $this->sendError('Contact Adresse not found');
        }

        return $this->sendResponse($contactAdresse->toArray(), 'Contact Adresse retrieved successfully');
    }

    /**
     * Update the specified ContactAdresse in storage.
     * PUT/PATCH /contactAdresses/{id}
     *
     * @param  int $id
     * @param UpdateContactAdresseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactAdresseAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContactAdresse $contactAdresse */
        $contactAdresse = $this->contactAdresseRepository->findWithoutFail($id);

        if (empty($contactAdresse)) {
            return $this->sendError('Contact Adresse not found');
        }

        $contactAdresse = $this->contactAdresseRepository->update($input, $id);

        return $this->sendResponse($contactAdresse->toArray(), 'ContactAdresse updated successfully');
    }

    /**
     * Remove the specified ContactAdresse from storage.
     * DELETE /contactAdresses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContactAdresse $contactAdresse */
        $contactAdresse = $this->contactAdresseRepository->findWithoutFail($id);

        if (empty($contactAdresse)) {
            return $this->sendError('Contact Adresse not found');
        }

        $contactAdresse->delete();

        return $this->sendResponse($id, 'Contact Adresse deleted successfully');
    }
}
