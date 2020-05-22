<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Repositories\MediaRepository;
use App\Repositories\CategorieRepository;
use App\Repositories\MediaAssocierRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MediaController extends AppBaseController
{
    /** @var  MediaRepository */
    private $mediaRepository;
    private $categorieRepository;
    private $mediaAssocierRepository;

    public function __construct(MediaRepository $mediaRepo,
                                CategorieRepository $categorieRepository,
                                MediaAssocierRepository $mediaAssocierRepository)
    {
        $this->mediaRepository = $mediaRepo;
        $this->categorieRepository = $categorieRepository;
        $this->mediaAssocierRepository = $mediaAssocierRepository;
    }

    /**
     * Display a listing of the Media.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->mediaRepository->pushCriteria(new RequestCriteria($request));
        $media = $this->mediaRepository->all();

        return view('media.index')
            ->with('media', $media);
    }

    /**
     * Show the form for creating a new Media.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $categories = $this->categorieRepository->all();
        return view('media.create')->with('categories', $categories);
    }

    /**
     * Store a newly created Media in storage.
     *
     * @param CreateMediaRequest $request
     *
     * @return Response
     */
    public function store(CreateMediaRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/medias');
            $image->move($destinationPath, $name);
            $input['image'] = $name;
        }



        if($request->hasFile('fichier')){
            $image = $request->file('fichier');
            $input['type'] = $image->getClientOriginalExtension();
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            if (!is_dir('medias')) {
                mkdir('medias', 0777, true);
            }
            $destinationPath = public_path('/medias');
            $image->move($destinationPath, $name);
            $input['fichier'] = $name;
        }

        $media = $this->mediaRepository->create($input);

        //dd($request);
        if($media) {
            if ($request->hasFile('fichier_associer')) {
                $fichier_associer = $request->fichier_associer;
                $name_associer = $request->name_associer;
                $folder = "associate_for_".$media->id;
                foreach ($fichier_associer as $key => $fichier) {
                    $elm = [];
                    $elm['name'] = $name_associer[$key];
                    $elm['media_id'] = $media->id;

                    $image = $fichier;
                    $elm['type'] = $image->getClientOriginalExtension();
                    $name = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                    if (!is_dir('medias/'.$folder)) {
                        mkdir('medias/'.$folder, 0777, true);
                    }
                    $destinationPath = public_path('/medias/'.$folder);
                    $image->move($destinationPath, $name);
                    $elm['fichier'] = $name;

                    $ma = $this->mediaAssocierRepository->create($elm);
                }
            }
        }

        $media->createAllMediaZip();

        Flash::success('Media saved successfully.');

        return redirect(route('media.index'));
    }

    /**
     * Display the specified Media.
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

        $media = $this->mediaRepository->findWithoutFail($id);

        if (empty($media)) {
            Flash::error('Media not found');

            return redirect(route('media.index'));
        }

        return view('media.show')->with('media', $media);
    }

    /**
     * Show the form for editing the specified Media.
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

        $media = $this->mediaRepository->findWithoutFail($id);

        if (empty($media)) {
            Flash::error('Media not found');

            return redirect(route('media.index'));
        }

        $categories = $this->categorieRepository->all();
        return view('media.edit')->with('media', $media)->with('categories', $categories);
    }

    /**
     * Update the specified Media in storage.
     *
     * @param  int              $id
     * @param UpdateMediaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMediaRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $media = $this->mediaRepository->findWithoutFail($id);

        if (empty($media)) {
            Flash::error('Media not found');

            return redirect(route('media.index'));
        }



        $input = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/medias');
            $image->move($destinationPath, $name);
            $input['image'] = $name;
        }


        if($request->hasFile('fichier')){
            $image = $request->file('fichier');
            $input['type'] = $image->getClientOriginalExtension();
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/medias');
            $image->move($destinationPath, $name);
            $input['fichier'] = $name;
        }

        $media = $this->mediaRepository->update($input, $id);

        //dd($request);
        if($media) {
            if ($request->hasFile('fichier_associer')) {
                $fichier_associer = $request->fichier_associer;
                $name_associer = $request->name_associer;
                $folder = "associate_for_".$media->id;
                foreach ($fichier_associer as $key => $fichier) {
                    $elm = [];
                    $elm['name'] = $name_associer[$key];
                    $elm['media_id'] = $media->id;

                    $image = $fichier;
                    $elm['type'] = $image->getClientOriginalExtension();
                    $name = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                    if (!is_dir('medias/'.$folder)) {
                        mkdir('medias/'.$folder, 0777, true);
                    }
                    $destinationPath = public_path('/medias/'.$folder);
                    $image->move($destinationPath, $name);
                    $elm['fichier'] = $name;

                    $ma = $this->mediaAssocierRepository->create($elm);
                }
            }
        }

        $media->createAllMediaZip();

        Flash::success('Media updated successfully.');

        return redirect(route('media.index'));
    }

    /**
     * Remove the specified Media from storage.
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

        $media = $this->mediaRepository->findWithoutFail($id);

        if (empty($media)) {
            Flash::error('Media not found');

            return redirect(route('media.index'));
        }

        $this->mediaRepository->delete($id);

        Flash::success('Media deleted successfully.');

        return redirect(route('media.index'));
    }



    public function mediaPage(Request $request)
    {
        $medias = $this->mediaRepository->all();
        $categories = $this->categorieRepository->all();

        return view('pages.media')
            //->with('medias', $medias)
            ->with("page_feedback", \Lg::ts('TRIBAL_MEMBERSHIP'))
            ->with('categories', $categories);
    }

    public function getMedia(Request $request)
    {

        $media = $this->mediaRepository->findWithoutFail($request->id);

        if (empty($media)) {
            $result = [
                "status" => "error",
                "data" => null
            ];

            return response()->json($result);
        }

        $media->setAllAccess();

        $result = [
            "status" => "success",
            "data" => $media
        ];

        return response()->json($result);
    }





    public function download($fichier, Request $request)
    {
        if(is_file($fichier)) {
            return response()->download(public_path($fichier));
        }else{
            Flash::error('File not found');

            return back();
        }
    }




    public function mediaDetail($id, Request $request)
    {
        $media = $this->mediaRepository->findWithoutFail($id);

        if (empty($media)) {

            Flash::error('Media not found');

            return redirect(route('magazines'));
        }


        return view('pages.mediadetail')->with('media', $media)
            ->with("page_feedback", \Lg::ts('Media - '.$media->name));
    }



}
