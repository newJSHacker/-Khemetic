<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSocialRequest;
use App\Http\Requests\UpdateSocialRequest;
use App\Repositories\SocialRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SocialController extends AppBaseController
{
    /** @var  SocialRepository */
    private $socialRepository;

    public function __construct(SocialRepository $socialRepo)
    {
        $this->socialRepository = $socialRepo;
    }

    /**
     * Display a listing of the Social.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->socialRepository->pushCriteria(new RequestCriteria($request));
        $socials = $this->socialRepository->all();

        return view('socials.index')
            ->with('socials', $socials);
    }

    /**
     * Show the form for creating a new Social.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        return view('socials.create');
    }

    /**
     * Store a newly created Social in storage.
     *
     * @param CreateSocialRequest $request
     *
     * @return Response
     */
    public function store(CreateSocialRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();


        if($request->hasFile('image')){
            $image = $request->file('image');
            $input['type'] = $image->getClientOriginalExtension();
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            if (!is_dir('socials')) {
                mkdir('socials', 0777, true);
            }
            $destinationPath = public_path('/socials');
            $image->move($destinationPath, $name);
            $input['image'] = $name;
        }

        $social = $this->socialRepository->create($input);

        Flash::success('Social saved successfully.');

        return redirect(route('socialmedia.index'));
    }

    /**
     * Display the specified Social.
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

        $social = $this->socialRepository->findWithoutFail($id);

        if (empty($social)) {
            Flash::error('Social not found');

            return redirect(route('socials.index'));
        }

        return view('socials.show')->with('social', $social);
    }

    /**
     * Show the form for editing the specified Social.
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

        $social = $this->socialRepository->findWithoutFail($id);

        if (empty($social)) {
            Flash::error('Social not found');

            return redirect(route('socials.index'));
        }

        return view('socials.edit')->with('social', $social);
    }

    /**
     * Update the specified Social in storage.
     *
     * @param  int              $id
     * @param UpdateSocialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSocialRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $social = $this->socialRepository->findWithoutFail($id);

        if (empty($social)) {
            Flash::error('Social not found');

            return redirect(route('socials.index'));
        }

        $input = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $input['type'] = $image->getClientOriginalExtension();
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            if (!is_dir('socials')) {
                mkdir('socials', 0777, true);
            }
            $destinationPath = public_path('/socials');
            $image->move($destinationPath, $name);
            $input['image'] = $name;
        }else{
            unset($input['image']);
        }

        $social = $this->socialRepository->update($input, $id);

        Flash::success('Social updated successfully.');

        return redirect(route('socialmedia.index'));
    }

    /**
     * Remove the specified Social from storage.
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

        $social = $this->socialRepository->findWithoutFail($id);

        if (empty($social)) {
            Flash::error('Social not found');

            return redirect(route('socials.index'));
        }

        $this->socialRepository->delete($id);

        Flash::success('Social deleted successfully.');

        return redirect(route('socialmedia.index'));
    }
}
