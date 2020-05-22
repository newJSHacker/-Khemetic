<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMediaAssocierRequest;
use App\Http\Requests\UpdateMediaAssocierRequest;
use App\Repositories\MediaAssocierRepository;
use App\Repositories\MediaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MediaAssocierController extends AppBaseController
{
    /** @var  MediaAssocierRepository */
    private $mediaAssocierRepository;
    private $mediaRepository;

    public function __construct(MediaAssocierRepository $mediaAssocierRepo,
                                MediaRepository $mediaRepo)
    {
        $this->mediaAssocierRepository = $mediaAssocierRepo;
        $this->mediaRepository = $mediaRepo;
    }

    /**
     * Display a listing of the MediaAssocier.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->mediaAssocierRepository->pushCriteria(new RequestCriteria($request));
        $mediaAssociers = $this->mediaAssocierRepository->all();

        return view('media_associers.index')
            ->with('mediaAssociers', $mediaAssociers);
    }

    /**
     * Show the form for creating a new MediaAssocier.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        return view('media_associers.create');
    }

    /**
     * Store a newly created MediaAssocier in storage.
     *
     * @param CreateMediaAssocierRequest $request
     *
     * @return Response
     */
    public function store(CreateMediaAssocierRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();

        if(!$request->has('media_id')){
            Flash::error('reliated media must be associate to existing media.');
            return back();
        }


        $media = $this->mediaRepository->findWithoutFail($request->media_id);
        if(empty($media)){
            Flash::error('reliated media must be associate to existing media.');
            return back();
        }

        if($request->hasFile('fichier')){
            $image = $request->file('fichier');
            $input['type'] = $image->getClientOriginalExtension();
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/medias/associate_for_'.$media->id);
            $image->move($destinationPath, $name);
            $input['fichier'] = $name;
        }

        $mediaAssocier = $this->mediaAssocierRepository->create($input);

        Flash::success('Media Associer saved successfully.');

        return redirect(route('associateMedia.index'));
    }

    /**
     * Display the specified MediaAssocier.
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

        $mediaAssocier = $this->mediaAssocierRepository->findWithoutFail($id);

        if (empty($mediaAssocier)) {
            Flash::error('Media Associer not found');

            return redirect(route('mediaAssociers.index'));
        }

        return view('media_associers.show')->with('mediaAssocier', $mediaAssocier);
    }

    /**
     * Show the form for editing the specified MediaAssocier.
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

        $mediaAssocier = $this->mediaAssocierRepository->findWithoutFail($id);

        if (empty($mediaAssocier)) {
            Flash::error('Media Associer not found');

            return redirect(route('mediaAssociers.index'));
        }

        return view('media_associers.edit')->with('mediaAssocier', $mediaAssocier);
    }

    /**
     * Update the specified MediaAssocier in storage.
     *
     * @param  int              $id
     * @param UpdateMediaAssocierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMediaAssocierRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $mediaAssocier = $this->mediaAssocierRepository->findWithoutFail($id);

        if (empty($mediaAssocier)) {
            Flash::error('Media Associer not found');

            return redirect(route('mediaAssociers.index'));
        }

        $input = $request->all();


        if($request->hasFile('fichier')){
            $folder = "associate_for_".$mediaAssocier->media->id;
            $image = $request->file('fichier');
            $input['type'] = $image->getClientOriginalExtension();
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            if (!is_dir('medias/'.$folder)) {
                mkdir('medias/'.$folder, 0777, true);
            }
            $destinationPath = public_path('/medias/'.$folder);
            $image->move($destinationPath, $name);
            $input['fichier'] = $name;
        }
        //dd($input);
        $mediaAssocier = $this->mediaAssocierRepository->update($input, $id);

        Flash::success('Reliated Media updated successfully.');

        return redirect(route('associateMedia.show', $mediaAssocier->id));
    }

    /**
     * Remove the specified MediaAssocier from storage.
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

        $mediaAssocier = $this->mediaAssocierRepository->findWithoutFail($id);

        if (empty($mediaAssocier)) {
            Flash::error('Media Associer not found');

            return redirect(route('mediaAssociers.index'));
        }

        $this->mediaAssocierRepository->delete($id);

        Flash::success('Media Associer deleted successfully.');

        return back();
    }
}
