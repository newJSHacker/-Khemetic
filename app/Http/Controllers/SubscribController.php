<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscribRequest;
use App\Http\Requests\UpdateSubscribRequest;
use App\Repositories\SubscribRepository;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Auth;

class SubscribController extends AppBaseController
{
    /** @var  SubscribRepository */
    private $subscribRepository;
    private $userRepository;

    public function __construct(SubscribRepository $subscribRepo, UserRepository $userRepository)
    {
        $this->subscribRepository = $subscribRepo;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the Subscrib.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->subscribRepository->pushCriteria(new RequestCriteria($request));
        $subscribs = $this->subscribRepository->all();

        return view('subscribs.index')
            ->with('subscribs', $subscribs);
    }

    /**
     * Show the form for creating a new Subscrib.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        return view('subscribs.create');
    }

    /**
     * Store a newly created Subscrib in storage.
     *
     * @param CreateSubscribRequest $request
     *
     * @return Response
     */
    public function store(CreateSubscribRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();

        $subscrib = $this->subscribRepository->create($input);

        if(!$request->ajax()){
            Flash::success('Subscrib saved successfully.');

            return redirect(route('subscribs.index'));
        }else{
            return response()->json([
                'status' => 'success',
                'data' => $subscrib
            ]);
        }

    }

    /**
     * Display the specified Subscrib.
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

        $subscrib = $this->subscribRepository->findWithoutFail($id);

        if (empty($subscrib)) {
            Flash::error('Subscrib not found');

            return redirect(route('subscribs.index'));
        }

        return view('subscribs.show')->with('subscrib', $subscrib);
    }

    /**
     * Show the form for editing the specified Subscrib.
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

        $subscrib = $this->subscribRepository->findWithoutFail($id);

        if (empty($subscrib)) {
            Flash::error('Subscrib not found');

            return redirect(route('subscribs.index'));
        }

        return view('subscribs.edit')->with('subscrib', $subscrib);
    }

    /**
     * Update the specified Subscrib in storage.
     *
     * @param  int              $id
     * @param UpdateSubscribRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubscribRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $subscrib = $this->subscribRepository->findWithoutFail($id);

        if (empty($subscrib)) {
            Flash::error('Subscrib not found');

            return redirect(route('subscribs.index'));
        }

        $subscrib = $this->subscribRepository->update($request->all(), $id);

        Flash::success('Subscrib updated successfully.');

        return redirect(route('subscribs.index'));
    }

    /**
     * Remove the specified Subscrib from storage.
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

        $subscrib = $this->subscribRepository->findWithoutFail($id);

        if (empty($subscrib)) {
            Flash::error('Subscrib not found');

            return redirect(route('subscribs.index'));
        }

        $this->subscribRepository->delete($id);

        Flash::success('Subscrib deleted successfully.');

        return redirect(route('subscribs.index'));
    }


    public function joinUs(Request $request)
    {

        return view('pages.joinus'); //->with('subscrib', $subscrib);
    }


    public function joinUsSave(Request $request)
    {
        if(!$request->has("social")) {
            $validatedData = $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'username' => 'required|alpha_num|unique:users|max:255',
                'password' => 'required|string|min:6',
            ]);
            //dd($request->all());

            $user = $this->userRepository->create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'active' => 0,
            ]);
        }else{

            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|string|email|max:255',
                'id' => 'required|max:255',
            ]);
            $u = $this->userRepository->findWhere([
                "email" => $request->email
            ]);
            if($u->count() > 0){
                $user = $u[0];
                //dd($user);
            }else{
                $validatedData = $request->validate([
                    'name' => 'required|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'id' => 'required|max:255',
                ]);

                $user = $this->userRepository->create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->id),
                    'first_name' => explode(' ', $request->name)[0],
                    'last_name' => count(explode(' ', $request->name, 2)) > 1 ? explode(' ', $request->name)[1] : "",
                    'username' => explode(' ', $request->name)[0],
                    'active' => 0,
                    'id' => $request->id,
                    'is_social' => 1,
                    'social' => $request->social,
                ]);
            }

        }

        if($user){

            $user->assignRole('user');
            Auth::login(\App\User::find($user->id), true);
            session()->flash('success', "Wellcome to your dashboard, You have to confirm your email adresse");
            return redirect(route('home-user'));
            /*
            if (Auth::attempt(['email' => $user->email, 'password' => $request->password], true)) {
                // The user is active, not suspended, and exists.
                session()->flash('success', "Wellcome to your dashboard, You have to confirm your email adresse");
                return redirect(route('home-user'));
            }
            */
        }

        return back()->withInput($request->all());
    }



}
