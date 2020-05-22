<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Repositories\LanguageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Lg;

class LanguageController extends AppBaseController
{
    /** @var  LanguageRepository */
    private $languageRepository;

    public function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepository = $languageRepo;
    }

    /**
     * Display a listing of the Language.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->languageRepository->pushCriteria(new RequestCriteria($request));
        $languages = $this->languageRepository->all();

        return view('languages.index')
            ->with('languages', $languages);
    }

    /**
     * Show the form for creating a new Language.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        Lg::forcerChargerText();
        return view('languages.create');
    }

    /**
     * Store a newly created Language in storage.
     *
     * @param CreateLanguageRequest $request
     *
     * @return Response
     */
    public function store(CreateLanguageRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();

        $language = $this->languageRepository->create($input);

        Lg::forcerChargerText();
        Flash::success('Language saved successfully.');

        return redirect(route('languages.index'));
    }

    /**
     * Display the specified Language.
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

        $language = $this->languageRepository->findWithoutFail($id);

        if (empty($language)) {
            Flash::error('Language not found');

            return redirect(route('languages.index'));
        }

        Lg::forcerChargerText();
        return view('languages.show')->with('language', $language);
    }

    /**
     * Show the form for editing the specified Language.
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

        $language = $this->languageRepository->findWithoutFail($id);

        if (empty($language)) {
            Flash::error('Language not found');

            return redirect(route('languages.index'));
        }

        Lg::forcerChargerText();
        return view('languages.edit')->with('language', $language);
    }

    /**
     * Update the specified Language in storage.
     *
     * @param  int              $id
     * @param UpdateLanguageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLanguageRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $language = $this->languageRepository->findWithoutFail($id);

        if (empty($language)) {
            Flash::error('Language not found');

            return redirect(route('languages.index'));
        }

        $language = $this->languageRepository->update($request->all(), $id);

        Lg::forcerChargerText();
        Flash::success('Language updated successfully.');

        return redirect(route('languages.index'));
    }

    /**
     * Remove the specified Language from storage.
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

        $language = $this->languageRepository->findWithoutFail($id);

        if (empty($language)) {
            Flash::error('Language not found');

            return redirect(route('languages.index'));
        }

        $this->languageRepository->delete($id);

        Lg::forcerChargerText();
        Flash::success('Language deleted successfully.');

        return redirect(route('languages.index'));
    }
    
    public function setLanguage($lang)
    {
        app()->setLocale($lang);
        session(['lang' => $lang]);
        //\App::setLocale($lang);
        //dd(session('lang'));
        return back();
    }
    
}
