<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDownloadRequest;
use App\Http\Requests\UpdateDownloadRequest;
use App\Repositories\DownloadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Lg;

class DownloadController extends AppBaseController
{
    /** @var  DownloadRepository */
    private $downloadRepository;

    public function __construct(DownloadRepository $downloadRepo)
    {
        $this->downloadRepository = $downloadRepo;
    }

    /**
     * Display a listing of the Download.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->downloadRepository->pushCriteria(new RequestCriteria($request));
        $downloads = $this->downloadRepository->all();
        Lg::forcerChargerText();
        return view('downloads.index')
            ->with('downloads', $downloads);
    }

    /**
     * Show the form for creating a new Download.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        Lg::forcerChargerText();
        return view('downloads.create');
    }

    /**
     * Store a newly created Download in storage.
     *
     * @param CreateDownloadRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();

        
        if($request->hasFile('fichier')){
            $image = $request->file('fichier');
            $input['type'] = $image->getClientOriginalExtension();
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/download');
            $image->move($destinationPath, $name);
            $input['fichier'] = $name;
        }
        
        if($request->page == 1){ //active
            $download = $this->downloadRepository->findWhere([
                "active" => true,
                "page" => 1
            ]);
            if($download->count() > 0){
                foreach($download as $d){
                    $d->active = false;
                    $d->save();
                }
            }
        }
        $input['active'] = true;
        
        $download = $this->downloadRepository->create($input);

        Flash::success('Document saved successfully.');

        return redirect(route('downloads.index'));
    }

    /**
     * Display the specified Download.
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

        $download = $this->downloadRepository->findWithoutFail($id);

        if (empty($download)) {
            Flash::error('Download not found');

            return redirect(route('downloads.index'));
        }

        Lg::forcerChargerText();
        return view('downloads.show')->with('download', $download);
    }

    /**
     * Show the form for editing the specified Download.
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

        $download = $this->downloadRepository->findWithoutFail($id);

        if (empty($download)) {
            Flash::error('Download not found');

            return redirect(route('downloads.index'));
        }

        return view('downloads.edit')->with('download', $download);
    }

    /**
     * Update the specified Download in storage.
     *
     * @param  int              $id
     * @param UpdateDownloadRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $download = $this->downloadRepository->findWithoutFail($id);

        if (empty($download)) {
            Flash::error('Download not found');

            return redirect(route('downloads.index'));
        }

        $input = $request->all();
        
        if($request->hasFile('fichier')){
            $image = $request->file('fichier');
            $input['type'] = $image->getClientOriginalExtension();
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/download');
            $image->move($destinationPath, $name);
            $input['fichier'] = $name;
        }else{
            unset($input['fichier']);
        }
        
        if($request->page == 1){ //active
            $download = $this->downloadRepository->findWhere([
                "active" => true,
                "page" => 1
            ]);
            if($download->count() > 0){
                foreach($download as $d){
                    $d->active = false;
                    $d->save();
                }
            }
        }
        $input['active'] = true;
        
        $download = $this->downloadRepository->update($input, $id);

        Flash::success('Download updated successfully.');

        return redirect(route('downloads.index'));
    }

    /**
     * Remove the specified Download from storage.
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

        $download = $this->downloadRepository->findWithoutFail($id);

        if (empty($download)) {
            Flash::error('Download not found');

            return redirect(route('downloads.index'));
        }

        $this->downloadRepository->delete($id);

        Flash::success('Download deleted successfully.');

        return redirect(route('downloads.index'));
    }
    
    public function activeAuth($id, $val){
        $download = $this->downloadRepository->findWithoutFail($id);

        if (empty($download)) {
            Flash::error('Download not found');

            return back();
        }
        
        $download->auth = $val;
        $download->save();
        
        return back();
    }
    
    
    public function active($id, $val){
        $download = $this->downloadRepository->findWithoutFail($id);

        if (empty($download)) {
            Flash::error('Download not found');

            return back();
        }
        
        if($download->page == 1 && $val == 1){ //active
            $downloads = $this->downloadRepository->findWhere([
                "active" => 1,
                "page" => 1
            ]);
            
            if($downloads->count() > 0){
                foreach($downloads as $d){
                    $d->active = false;
                    $d->save();
                }
            }
        }
        $download->active = $val;
        $download->save();
        
        return back();
    }
    
    
    public function membership(Request $request){
        $downloads = $this->downloadRepository->findWhere([
            'page' => 1,
            'active' => 1
        ]);
        $no_param = 0;
        if(session()->has('no_param')){
            $no_param = 1;
        }
        
        return view('pages.membership')
                ->with('downloads', $downloads)
            ->with("page_feedback", \Lg::ts('TRIBAL_MEMBERSHIP'))
                ->with('no_param', $no_param);
        
    }
    
    public function tribalServices(Request $request){
        $downloads = $this->downloadRepository->findWhere([
            ['page', '!=', 1],
            'active' => 1
        ]);
        return view('pages.tribal_services')
                ->with('downloads', $downloads)
            ->with("page_feedback", \Lg::ts('TRIBAL_SERVICE'));
    }
    
}
