<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePageStaticRequest;
use App\Http\Requests\UpdatePageStaticRequest;
use App\Repositories\PageStaticRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PageStaticController extends AppBaseController
{
    /** @var  PageStaticRepository */
    private $pageStaticRepository;

    public function __construct(PageStaticRepository $pageStaticRepo)
    {
        $this->pageStaticRepository = $pageStaticRepo;
    }

    /**
     * Display a listing of the PageStatic.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->pageStaticRepository->pushCriteria(new RequestCriteria($request));
        $pageStatics = $this->pageStaticRepository->all();

        return view('page_statics.index')
            ->with('pageStatics', $pageStatics);
    }

    /**
     * Show the form for creating a new PageStatic.
     *
     * @return Response
     */
    public function create()
    {

        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        return view('page_statics.create');
    }

    /**
     * Store a newly created PageStatic in storage.
     *
     * @param CreatePageStaticRequest $request
     *
     * @return Response
     */
    public function store(CreatePageStaticRequest $request)
    {

        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();

        $pageStatic = $this->pageStaticRepository->create($input);

        Flash::success('Page Static saved successfully.');

        return redirect(route('pageStatics.index'));
    }

    /**
     * Display the specified PageStatic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $pageStatic = $this->pageStaticRepository->findWithoutFail($id);

        if (empty($pageStatic)) {
            Flash::error('Page Static not found');

            return redirect(route('pageStatics.index'));
        }

        return view('page_statics.show')->with('pageStatic', $pageStatic);
    }

    /**
     * Show the form for editing the specified PageStatic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $pageStatic = $this->pageStaticRepository->findWithoutFail($id);

        if (empty($pageStatic)) {
            Flash::error('Page Static not found');

            return redirect(route('pageStatics.index'));
        }

        return view('page_statics.edit')->with('pageStatic', $pageStatic);
    }

    /**
     * Update the specified PageStatic in storage.
     *
     * @param  int              $id
     * @param UpdatePageStaticRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePageStaticRequest $request)
    {

        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $pageStatic = $this->pageStaticRepository->findWithoutFail($id);

        if (empty($pageStatic)) {
            Flash::error('Page Static not found');

            return redirect(route('pageStatics.index'));
        }

        $pageStatic = $this->pageStaticRepository->update($request->all(), $id);

        Flash::success('Page Static updated successfully.');

        return redirect(route('pageStatics.index'));
    }

    /**
     * Remove the specified PageStatic from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {

        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $pageStatic = $this->pageStaticRepository->findWithoutFail($id);

        if (empty($pageStatic)) {
            Flash::error('Page Static not found');

            return redirect(route('pageStatics.index'));
        }

        $this->pageStaticRepository->delete($id);

        Flash::success('Page Static deleted successfully.');

        return redirect(route('pageStatics.index'));
    }



    public function showPage($code, Request $request)
    {

        $pageStatic = $this->pageStaticRepository->findWhere([
            "code" => $code
        ]);

        if ($pageStatic->count() == 0) {
            Alert::error('Page not found', "")->autoclose(10000);

            return redirect(url('/'));
        }

        return view('page_statics.page')->with('pageStatic', $pageStatic[0]);
    }


}
