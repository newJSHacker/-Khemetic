<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBackgroundRequest;
use App\Http\Requests\UpdateBackgroundRequest;
use App\Repositories\BackgroundRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BackgroundController extends AppBaseController
{
    /** @var  BackgroundRepository */
    private $backgroundRepository;

    public function __construct(BackgroundRepository $backgroundRepo)
    {
        $this->backgroundRepository = $backgroundRepo;
    }

    /**
     * Display a listing of the Background.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $this->backgroundRepository->pushCriteria(new RequestCriteria($request));
        $backgrounds = $this->backgroundRepository->all();

        return view('backgrounds.index')
            ->with('backgrounds', $backgrounds);
    }

    /**
     * Show the form for creating a new Background.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        return view('backgrounds.create');
    }

    /**
     * Store a newly created Background in storage.
     *
     * @param CreateBackgroundRequest $request
     *
     * @return Response
     */
    public function store(CreateBackgroundRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $input = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $input['type'] = $image->getClientOriginalExtension();
            $name = uniqid().'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $input['image'] = $name;
        }

        $background = $this->backgroundRepository->create($input);

        Flash::success('Background saved successfully.');

        return redirect(route('backgrounds.index'));
    }

    /**
     * Display the specified Background.
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

        $background = $this->backgroundRepository->findWithoutFail($id);

        if (empty($background)) {
            Flash::error('Background not found');

            return redirect(route('backgrounds.index'));
        }

        return view('backgrounds.show')->with('background', $background);
    }

    /**
     * Show the form for editing the specified Background.
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

        $background = $this->backgroundRepository->findWithoutFail($id);

        if (empty($background)) {
            Flash::error('Background not found');

            return redirect(route('backgrounds.index'));
        }

        return view('backgrounds.edit')->with('background', $background);
    }

    /**
     * Update the specified Background in storage.
     *
     * @param  int              $id
     * @param UpdateBackgroundRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBackgroundRequest $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }

        $background = $this->backgroundRepository->findWithoutFail($id);

        if (empty($background)) {
            Flash::error('Background not found');

            return redirect(route('backgrounds.index'));
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

        $background = $this->backgroundRepository->update($input, $id);

        Flash::success('Background updated successfully.');

        return redirect(route('backgrounds.index'));
    }

    /**
     * Remove the specified Background from storage.
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

        $background = $this->backgroundRepository->findWithoutFail($id);

        if (empty($background)) {
            Flash::error('Background not found');

            return redirect(route('backgrounds.index'));
        }

        $this->backgroundRepository->delete($id);

        Flash::success('Background deleted successfully.');

        return redirect(route('backgrounds.index'));
    }
}
