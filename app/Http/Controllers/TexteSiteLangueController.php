<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTexteSiteLangueRequest;
use App\Http\Requests\UpdateTexteSiteLangueRequest;
use App\Repositories\TexteSiteLangueRepository;
use App\Repositories\TexteSiteRepository;
use App\Repositories\LanguageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TexteSiteLangueController extends AppBaseController
{
    /** @var  TexteSiteLangueRepository */
    private $texteSiteLangueRepository;
    private $texteSiteRepository;
    private $languageRepository;

    public function __construct(TexteSiteLangueRepository $texteSiteLangueRepo,
            TexteSiteRepository $texteSiteRepo,
            LanguageRepository $languageRepository)
    {
        $this->texteSiteLangueRepository = $texteSiteLangueRepo;
        $this->texteSiteRepository = $texteSiteRepo;
        $this->languageRepository = $languageRepository;
    }

    /**
     * Display a listing of the TexteSiteLangue.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->texteSiteLangueRepository->pushCriteria(new RequestCriteria($request));
        $texteSiteLangues = $this->texteSiteLangueRepository->all();
        $texteSite = $this->texteSiteRepository->all();
        $langs = $this->languageRepository->all();
        $cur_lang = 'fr';
        if($request->has('lang')){
            $cur_lang = $request->input('lang');
        }
        $lang = $this->languageRepository->findWhere([
            'abbr'=> $cur_lang
        ]);
        $current_lang = collect();
        if($lang->count() > 0){
            $current_lang = $lang[0];
        }
        
        
        
        return view('texte_site_langues.index')
            ->with('current_lang', $current_lang)
            ->with('languages', $langs)
            ->with('texteSiteLangues', $texteSiteLangues)
            ->with('texteSite', $texteSite);
    }

    /**
     * Show the form for creating a new TexteSiteLangue.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        return view('texte_site_langues.create');
    }

    /**
     * Store a newly created TexteSiteLangue in storage.
     *
     * @param CreateTexteSiteLangueRequest $request
     *
     * @return Response
     */
    public function store(CreateTexteSiteLangueRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();

        $texteSiteLangue = $this->texteSiteLangueRepository->create($input);

        Flash::success('Texte Site Langue saved successfully.');

        return redirect(route('texteSiteLangues.index'));
    }
    
    public function newApi(Request $request)
    {
        
        $texteSite = $this->texteSiteRepository->findWithoutFail($request->texte_site_id);
        
        if (empty($texteSite)) {
            $result = ['status'=>0, 'data'=>[]];
            return response()->json($result);
        }
        $input = [
            'langue_id' => $request->langue_id,
            'texte_site_id' => $texteSite->id,
            'section' => $texteSite->section,
            'code' => $texteSite->code,
            'texte' => $request->texte
        ];
        $texteSiteLangue = $this->texteSiteLangueRepository->create($input);

        
        $result = ['status'=>1, 'data'=>$texteSiteLangue];
        return response()->json($result);
    }

    /**
     * Display the specified TexteSiteLangue.
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

        $texteSiteLangue = $this->texteSiteLangueRepository->findWithoutFail($id);

        if (empty($texteSiteLangue)) {
            Flash::error('Texte Site Langue not found');

            return redirect(route('texteSiteLangues.index'));
        }

        return view('texte_site_langues.show')->with('texteSiteLangue', $texteSiteLangue);
    }

    /**
     * Show the form for editing the specified TexteSiteLangue.
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

        $texteSiteLangue = $this->texteSiteLangueRepository->findWithoutFail($id);

        if (empty($texteSiteLangue)) {
            Flash::error('Texte Site Langue not found');

            return redirect(route('texteSiteLangues.index'));
        }

        return view('texte_site_langues.edit')->with('texteSiteLangue', $texteSiteLangue);
    }

    /**
     * Update the specified TexteSiteLangue in storage.
     *
     * @param  int              $id
     * @param UpdateTexteSiteLangueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTexteSiteLangueRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $texteSiteLangue = $this->texteSiteLangueRepository->findWithoutFail($id);

        if (empty($texteSiteLangue)) {
            Flash::error('Texte Site Langue not found');

            return redirect(route('texteSiteLangues.index'));
        }

        $texteSiteLangue = $this->texteSiteLangueRepository->update($request->all(), $id);

        Flash::success('Texte Site Langue updated successfully.');

        return redirect(route('texteSiteLangues.index'));
    }
    
    public function updateApi(Request $request)
    {
        $texteSiteLangue = $this->texteSiteLangueRepository->findWithoutFail($request->id);

        if (empty($texteSiteLangue)) {
            $result = ['status'=>0, 'data'=>[]];
            return response()->json($result);
        }

        $texteSiteLangue = $this->texteSiteLangueRepository->update($request->all(), $request->id);

        $result = ['status'=>1, 'data'=>$texteSiteLangue];
        return response()->json($result);
        
    }

    /**
     * Remove the specified TexteSiteLangue from storage.
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

        $texteSiteLangue = $this->texteSiteLangueRepository->findWithoutFail($id);

        if (empty($texteSiteLangue)) {
            Flash::error('Texte Site Langue not found');

            return redirect(route('texteSiteLangues.index'));
        }

        $this->texteSiteLangueRepository->delete($id);

        Flash::success('Texte Site Langue deleted successfully.');

        return redirect(route('texteSiteLangues.index'));
    }
}
