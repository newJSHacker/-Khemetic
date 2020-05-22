<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Lg;
use Illuminate\Support\Facades\Auth;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();

        return view('users.index')
            ->with('users', $users);
    }



    public function index2(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();

        return view('users.admin')
            ->with('users', $users);
    }




    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/profils');
            $image->move($destinationPath, $name);
            $input['photo'] = $name;
        }
        
        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');
        if($user->isAdmin()){
            return redirect(route('admins'));
        }else {
            return redirect(route('users.index'));
        }
    }

    /**
     * Display the specified User.
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

        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }


    /**
     * Show the form for editing the specified User.
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

        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        
        
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/profils');
            $image->move($destinationPath, $name);
            $input['photo'] = $name;
        }
        
        $user = $this->userRepository->update($input, $id);

        Flash::success('User updated successfully.');


        if($user->isAdmin()){
            return redirect(route('admins'));
        }else {
            return redirect(route('users.index'));
        }
    }

    /**
     * Remove the specified User from storage.
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

        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }



    public function login(Request $request){
        $email = $request->email;
        $pwd = $request->password;
        $remember = true; //isset($request->remember);
        Lg::forcerChargerText();
        if (Auth::attempt(['email' => $email, 'password' => $pwd], $remember)) {
            // The user is being remembered...
            if(!auth()->user()->isAdmin()){
                return redirect(route('home-user'));
            }else{
                Auth::logout();
                $msg = "Look like you are more than simple user, please use the apropriate url to login ";
                Flash::error($msg);
                Alert::error($msg, "");
                return redirect(url('/'));
            }

        }


        Flash::error("email ou mot de passe incorrect");
        Alert::error('email ou mot de passe incorrect', 'Paramètres incorrects');
        return back()->withInput($request->input());
    }



    public function userDashboard(Request $request)
    {
        $user = $this->userRepository->findWithoutFail(auth()->user()->id);

        if(!$user->isAdmin() && !$user->hasRole('user')){
            $user->assignRole('user');
            $u = \App\User::find($user->id);
            $u->assignRole('user');
        }

        if (empty($user)) {
            Flash::error('User not found');
            alert()->error('Error','User not found.')->autoClose(10000);
            return back();
        }


        return view('users.pages.dashboard')->with('user', $user);
    }



}
