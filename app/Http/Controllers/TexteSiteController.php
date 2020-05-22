<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTexteSiteRequest;
use App\Http\Requests\UpdateTexteSiteRequest;
use App\Repositories\TexteSiteRepository;
use App\Models\TexteSite;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TexteSiteController extends AppBaseController
{
    /** @var  TexteSiteRepository */
    private $texteSiteRepository;

    public function __construct(TexteSiteRepository $texteSiteRepo)
    {
        $this->texteSiteRepository = $texteSiteRepo;
    }

    /**
     * Display a listing of the TexteSite.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->texteSiteRepository->pushCriteria(new RequestCriteria($request));
        
        $sections = TexteSite::distinct('section')->pluck('section');
        //dd($section); section
        $cur_section = "";
        if($sections->count() > 0)
            $cur_section = $sections[0];
        if($request->has('section')){
            $cur_section = $request->input('section');
        }
        
        $texteSites = $this->texteSiteRepository->findWhere(['section' => $cur_section]);

        return view('texte_sites.index')
            ->with('sections', $sections)
            ->with('cur_section', $cur_section)
            ->with('texteSites', $texteSites);
    }

    /**
     * Show the form for creating a new TexteSite.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        return view('texte_sites.create');
    }

    /**
     * Store a newly created TexteSite in storage.
     *
     * @param CreateTexteSiteRequest $request
     *
     * @return Response
     */
    public function store(CreateTexteSiteRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();

        $texteSite = $this->texteSiteRepository->create($input);

        Flash::success('Texte Site saved successfully.');

        return redirect(route('texteSites.index'));
    }

    /**
     * Display the specified TexteSite.
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

        $texteSite = $this->texteSiteRepository->findWithoutFail($id);

        if (empty($texteSite)) {
            Flash::error('Texte Site not found');

            return redirect(route('texteSites.index'));
        }

        return view('texte_sites.show')->with('texteSite', $texteSite);
    }

    /**
     * Show the form for editing the specified TexteSite.
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

        $texteSite = $this->texteSiteRepository->findWithoutFail($id);

        if (empty($texteSite)) {
            Flash::error('Texte Site not found');

            return redirect(route('texteSites.index'));
        }

        return view('texte_sites.edit')->with('texteSite', $texteSite);
    }

    /**
     * Update the specified TexteSite in storage.
     *
     * @param  int              $id
     * @param UpdateTexteSiteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTexteSiteRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $texteSite = $this->texteSiteRepository->findWithoutFail($id);

        if (empty($texteSite)) {
            Flash::error('Texte Site not found');

            return redirect(route('texteSites.index'));
        }

        $texteSite = $this->texteSiteRepository->update($request->all(), $id);

        Flash::success('Texte Site updated successfully.');

        return redirect(route('texteSites.index'));
    }

    /**
     * Remove the specified TexteSite from storage.
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

        $texteSite = $this->texteSiteRepository->findWithoutFail($id);

        if (empty($texteSite)) {
            Flash::error('Texte Site not found');

            return redirect(route('texteSites.index'));
        }

        $this->texteSiteRepository->delete($id);

        Flash::success('Texte Site deleted successfully.');

        return redirect(route('texteSites.index'));
    }
}
