<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTestSiteAPIRequest;
use App\Http\Requests\API\UpdateTestSiteAPIRequest;
use App\Models\TestSite;
use App\Repositories\TestSiteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TestSiteController
 * @package App\Http\Controllers\API
 */

class TestSiteAPIController extends AppBaseController
{
    /** @var  TestSiteRepository */
    private $testSiteRepository;

    public function __construct(TestSiteRepository $testSiteRepo)
    {
        $this->testSiteRepository = $testSiteRepo;
    }

    /**
     * Display a listing of the TestSite.
     * GET|HEAD /testSites
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->testSiteRepository->pushCriteria(new RequestCriteria($request));
        $this->testSiteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $testSites = $this->testSiteRepository->all();

        return $this->sendResponse($testSites->toArray(), 'Test Sites retrieved successfully');
    }

    /**
     * Store a newly created TestSite in storage.
     * POST /testSites
     *
     * @param CreateTestSiteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTestSiteAPIRequest $request)
    {
        $input = $request->all();

        $testSites = $this->testSiteRepository->create($input);

        return $this->sendResponse($testSites->toArray(), 'Test Site saved successfully');
    }

    /**
     * Display the specified TestSite.
     * GET|HEAD /testSites/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TestSite $testSite */
        $testSite = $this->testSiteRepository->findWithoutFail($id);

        if (empty($testSite)) {
            return $this->sendError('Test Site not found');
        }

        return $this->sendResponse($testSite->toArray(), 'Test Site retrieved successfully');
    }

    /**
     * Update the specified TestSite in storage.
     * PUT/PATCH /testSites/{id}
     *
     * @param  int $id
     * @param UpdateTestSiteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestSiteAPIRequest $request)
    {
        $input = $request->all();

        /** @var TestSite $testSite */
        $testSite = $this->testSiteRepository->findWithoutFail($id);

        if (empty($testSite)) {
            return $this->sendError('Test Site not found');
        }

        $testSite = $this->testSiteRepository->update($input, $id);

        return $this->sendResponse($testSite->toArray(), 'TestSite updated successfully');
    }

    /**
     * Remove the specified TestSite from storage.
     * DELETE /testSites/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TestSite $testSite */
        $testSite = $this->testSiteRepository->findWithoutFail($id);

        if (empty($testSite)) {
            return $this->sendError('Test Site not found');
        }

        $testSite->delete();

        return $this->sendResponse($id, 'Test Site deleted successfully');
    }
}
