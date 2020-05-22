<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDownloadAPIRequest;
use App\Http\Requests\API\UpdateDownloadAPIRequest;
use App\Models\Download;
use App\Repositories\DownloadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DownloadController
 * @package App\Http\Controllers\API
 */

class DownloadAPIController extends AppBaseController
{
    /** @var  DownloadRepository */
    private $downloadRepository;

    public function __construct(DownloadRepository $downloadRepo)
    {
        $this->downloadRepository = $downloadRepo;
    }

    /**
     * Display a listing of the Download.
     * GET|HEAD /downloads
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->downloadRepository->pushCriteria(new RequestCriteria($request));
        $this->downloadRepository->pushCriteria(new LimitOffsetCriteria($request));
        $downloas = $this->downloadRepository->all();
        
        
        $downloads = [];
        foreach($downloas as $p){
            $downloads[] = [
                'id' => $p->id,
                'page' => $p->getPageAPI(),
                'fichier' => $p->getLink(),
                'auth' => $p->getAuthAPI(),
                'description' => $p->description,
                'active' => $p->active,
                'type' => $p->type,
                'title' => $p->title,
                'subtitle' => $p->subtitle,
                'created_at' => $p->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $p->updated_at->format('Y-m-d H:i:s'),
                'deleted_at' => $p->deleted_at ? $p->deleted_at->format('Y-m-d H:i:s') : ""
            ];
        }

        
        return $this->sendResponse($downloads, 'Downloads retrieved successfully');
    }

    /**
     * Store a newly created Download in storage.
     * POST /downloads
     *
     * @param CreateDownloadAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDownloadAPIRequest $request)
    {
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
        
        
        $downloads = $this->downloadRepository->create($input);

        return $this->sendResponse($downloads->toArray(), 'Download saved successfully');
    }

    /**
     * Display the specified Download.
     * GET|HEAD /downloads/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Download $download */
        $p = $this->downloadRepository->findWithoutFail($id);

        if (empty($p)) {
            return $this->sendError('Download not found');
        }

        
        $download = [
                'id' => $p->id,
                'page' => $p->getPageAPI(),
                'fichier' => $p->getLink(),
                'auth' => $p->getAuthAPI(),
                'description' => $p->description,
                'active' => $p->active,
                'type' => $p->type,
                'title' => $p->title,
                'subtitle' => $p->subtitle,
                'created_at' => $p->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $p->updated_at->format('Y-m-d H:i:s'),
                'deleted_at' => $p->deleted_at ? $p->deleted_at->format('Y-m-d H:i:s') : ""
            ];
        
        return $this->sendResponse($download, 'Download retrieved successfully');
    }

    /**
     * Update the specified Download in storage.
     * PUT/PATCH /downloads/{id}
     *
     * @param  int $id
     * @param UpdateDownloadAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDownloadAPIRequest $request)
    {
        $input = $request->all();

        /** @var Download $download */
        $download = $this->downloadRepository->findWithoutFail($id);

        if (empty($download)) {
            return $this->sendError('Download not found');
        }

        
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

        return $this->sendResponse($download->toArray(), 'Download updated successfully');
    }

    /**
     * Remove the specified Download from storage.
     * DELETE /downloads/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Download $download */
        $download = $this->downloadRepository->findWithoutFail($id);

        if (empty($download)) {
            return $this->sendError('Download not found');
        }

        $download->delete();

        return $this->sendResponse($id, 'Download deleted successfully');
    }
    
    
    
}
