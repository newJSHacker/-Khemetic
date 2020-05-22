<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Repositories\ProduitRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProduitController extends AppBaseController
{
    /** @var  ProduitRepository */
    private $produitRepository;

    public function __construct(ProduitRepository $produitRepo)
    {
        $this->produitRepository = $produitRepo;
    }

    /**
     * Display a listing of the Produit.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->produitRepository->pushCriteria(new RequestCriteria($request));
        $produits = $this->produitRepository->all();

        return view('produits.index')
            ->with('produits', $produits);
    }

    /**
     * Show the form for creating a new Produit.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        return view('produits.create');
    }

    /**
     * Store a newly created Produit in storage.
     *
     * @param CreateProduitRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/produits');
            $image->move($destinationPath, $name);
            $input['photo'] = $name;
        }

        $produit = $this->produitRepository->create($input);

        Flash::success('Produit saved successfully.');

        return redirect(route('produits.index'));
    }

    /**
     * Display the specified Produit.
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

        $produit = $this->produitRepository->findWithoutFail($id);

        if (empty($produit)) {
            Flash::error('Produit not found');

            return redirect(route('produits.index'));
        }

        return view('produits.show')->with('produit', $produit);
    }

    /**
     * Show the form for editing the specified Produit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produit = $this->produitRepository->findWithoutFail($id);

        if (empty($produit)) {
            Flash::error('Produit not found');

            return redirect(route('produits.index'));
        }

        return view('produits.edit')->with('produit', $produit);
    }

    /**
     * Update the specified Produit in storage.
     *
     * @param  int              $id
     * @param UpdateProduitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduitRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $produit = $this->produitRepository->findWithoutFail($id);

        if (empty($produit)) {
            Flash::error('Produit not found');

            return redirect(route('produits.index'));
        }

        $input = $request->all();

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/produits');
            $image->move($destinationPath, $name);
            $input['photo'] = $name;
        }


        $produit = $this->produitRepository->update($input, $id);

        Flash::success('Produit updated successfully.');

        return redirect(route('produits.index'));
    }

    /**
     * Remove the specified Produit from storage.
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

        $produit = $this->produitRepository->findWithoutFail($id);

        if (empty($produit)) {
            Flash::error('Produit not found');

            return redirect(route('produits.index'));
        }

        $this->produitRepository->delete($id);

        Flash::success('Produit deleted successfully.');

        return redirect(route('produits.index'));
    }

    public function shop(Request $request)
    {
        //$produits = $this->produitRepository->all();


        $url = config('app.SHOP_URL')."get-product";

        $result = $this->postRequest(['_token' => csrf_token()], $url);

        $produits = json_decode($result);



        $trois = [];
        $i = 1; $j = 0;
        foreach($produits as $p){
            $trois[$j][] = $p;
            if($i % 3 == 0){
                $j++;
            }

        }
        if(count($trois) > 0){
            $trois = $trois[0];
        }
        //dd($trois);

        return view('pages.shop')
                ->with('trois', $trois)
                ->with("page_feedback", \Lg::ts('SHOP'))
                ->with('produits', $produits);
    }


    public  function postRequest($data,$url){
        $headers = array(
            "Content-Type: application/json");
        $curl = curl_init();
        //var_dump($curl);
        if (FALSE === $curl){
            throw new \Exception('failed to initialize');
        }


        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            //CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POST => 1,
            CURLOPT_SSL_VERIFYPEER=>false,
            CURLOPT_POSTFIELDS =>json_encode($data)
        ));
        // Send the request & save response to $resp
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        /*echo curl_getinfo($curl) . '<br/>';
        echo curl_errno($curl) . '<br/>';
        echo curl_error($curl) . '<br/>';*/
        // Close request to clear up some resources
        curl_close($curl);
        return $resp;

    }


}
