<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactAdresseRequest;
use App\Http\Requests\UpdateContactAdresseRequest;
use App\Repositories\ContactAdresseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Download;

class ContactAdresseController extends AppBaseController
{
    /** @var  ContactAdresseRepository */
    private $contactAdresseRepository;

    public function __construct(ContactAdresseRepository $contactAdresseRepo)
    {
        $this->contactAdresseRepository = $contactAdresseRepo;
    }

    /**
     * Display a listing of the ContactAdresse.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->contactAdresseRepository->pushCriteria(new RequestCriteria($request));
        $contactAdresses = $this->contactAdresseRepository->all();

        return view('contact_adresses.index')
            ->with('contactAdresses', $contactAdresses);
    }

    /**
     * Show the form for creating a new ContactAdresse.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        return view('contact_adresses.create');
    }

    /**
     * Store a newly created ContactAdresse in storage.
     *
     * @param CreateContactAdresseRequest $request
     *
     * @return Response
     */
    public function store(CreateContactAdresseRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();
        if($request->has('from_view')){
            if($request->email == "" || $request->tel == "" || $request->nom == ""){
                return redirect(route('membership'))->with('no_param', '1');
            }
        }
        $contactAdresse = $this->contactAdresseRepository->create($input);

        if($request->has('download')){
            return $this->downloadImage($request->download);
        }
        
        Flash::success('Contact Adresse saved successfully.');

        return redirect(route('contactAdresses.index'));
    }

    public function downloadImage($Id){
        $fichier = Download::where('id', $Id)->firstOrFail();
        $path = public_path(). '/download/'. $fichier->fichier;
        return response()->download($path, $fichier->fichier, ['Content-Type' => $fichier->type]);
    }
    
    
    /**
     * Display the specified ContactAdresse.
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

        $contactAdresse = $this->contactAdresseRepository->findWithoutFail($id);

        if (empty($contactAdresse)) {
            Flash::error('Contact Adresse not found');

            return redirect(route('contactAdresses.index'));
        }

        return view('contact_adresses.show')->with('contactAdresse', $contactAdresse);
    }

    /**
     * Show the form for editing the specified ContactAdresse.
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

        $contactAdresse = $this->contactAdresseRepository->findWithoutFail($id);

        if (empty($contactAdresse)) {
            Flash::error('Contact Adresse not found');

            return redirect(route('contactAdresses.index'));
        }

        return view('contact_adresses.edit')->with('contactAdresse', $contactAdresse);
    }

    /**
     * Update the specified ContactAdresse in storage.
     *
     * @param  int              $id
     * @param UpdateContactAdresseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactAdresseRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $contactAdresse = $this->contactAdresseRepository->findWithoutFail($id);

        if (empty($contactAdresse)) {
            Flash::error('Contact Adresse not found');

            return redirect(route('contactAdresses.index'));
        }

        $contactAdresse = $this->contactAdresseRepository->update($request->all(), $id);

        Flash::success('Contact Adresse updated successfully.');

        return redirect(route('contactAdresses.index'));
    }

    /**
     * Remove the specified ContactAdresse from storage.
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

        $contactAdresse = $this->contactAdresseRepository->findWithoutFail($id);

        if (empty($contactAdresse)) {
            Flash::error('Contact Adresse not found');

            return redirect(route('contactAdresses.index'));
        }

        $this->contactAdresseRepository->delete($id);

        Flash::success('Contact Adresse deleted successfully.');

        return redirect(route('contactAdresses.index'));
    }
}
