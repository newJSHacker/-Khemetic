<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProduitAPIRequest;
use App\Http\Requests\API\UpdateProduitAPIRequest;
use App\Models\Produit;
use App\Repositories\ProduitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProduitController
 * @package App\Http\Controllers\API
 */

class ProduitAPIController extends AppBaseController
{
    /** @var  ProduitRepository */
    private $produitRepository;

    public function __construct(ProduitRepository $produitRepo)
    {
        $this->produitRepository = $produitRepo;
    }

    /**
     * Display a listing of the Produit.
     * GET|HEAD /produits
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->produitRepository->pushCriteria(new RequestCriteria($request));
        $this->produitRepository->pushCriteria(new LimitOffsetCriteria($request));
        $products = $this->produitRepository->all();
        
        $produits = [];
        foreach($products as $p){
            $produits[] = [
                'id' => $p->id,
                'photo' => $p->getImageLink(),
                'title' => $p->title,
                'redirect_link' => $p->redirect_link,
                'created_at' => $p->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $p->updated_at->format('Y-m-d H:i:s'),
                'deleted_at' => $p->deleted_at ? $p->deleted_at->format('Y-m-d H:i:s') : ""
            ];
        }

        return $this->sendResponse($produits, 'Produits retrieved successfully');
    }

    /**
     * Store a newly created Produit in storage.
     * POST /produits
     *
     * @param CreateProduitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProduitAPIRequest $request)
    {
        $input = $request->all();
        
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/produits');
            $image->move($destinationPath, $name);
            $input['photo'] = $name;
        }
        
        $produits = $this->produitRepository->create($input);

        return $this->sendResponse($produits->toArray(), 'Produit saved successfully');
    }

    /**
     * Display the specified Produit.
     * GET|HEAD /produits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Produit $produit */
        $p = $this->produitRepository->findWithoutFail($id);

        if (empty($p)) {
            return $this->sendError('Produit not found');
        }
        $produit = [
                'id' => $p->id,
                'photo' => $p->getImageLink(),
                'title' => $p->title,
                'redirect_link' => $p->redirect_link,
                'created_at' => $p->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $p->updated_at->format('Y-m-d H:i:s'),
                'deleted_at' => $p->deleted_at ? $p->deleted_at->format('Y-m-d H:i:s') : ""
            ];
        return $this->sendResponse($produit, 'Produit retrieved successfully');
    }

    /**
     * Update the specified Produit in storage.
     * PUT/PATCH /produits/{id}
     *
     * @param  int $id
     * @param UpdateProduitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduitAPIRequest $request)
    {
        $input = $request->all();

        /** @var Produit $produit */
        $produit = $this->produitRepository->findWithoutFail($id);

        if (empty($produit)) {
            return $this->sendError('Produit not found');
        }
        
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/produits');
            $image->move($destinationPath, $name);
            $input['photo'] = $name;
        }
        
        $produit = $this->produitRepository->update($input, $id);

        return $this->sendResponse($produit->toArray(), 'Produit updated successfully');
    }

    /**
     * Remove the specified Produit from storage.
     * DELETE /produits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Produit $produit */
        $produit = $this->produitRepository->findWithoutFail($id);

        if (empty($produit)) {
            return $this->sendError('Produit not found');
        }

        $produit->delete();

        return $this->sendResponse($id, 'Produit deleted successfully');
    }
    
    
    
}
