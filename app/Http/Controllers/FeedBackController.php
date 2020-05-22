<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeedBackRequest;
use App\Http\Requests\UpdateFeedBackRequest;
use App\Repositories\FeedBackRepository;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FeedBackController extends AppBaseController
{
    /** @var  FeedBackRepository */
    private $feedBackRepository;
    private $userRepository;

    public function __construct(FeedBackRepository $feedBackRepo
        , UserRepository $userRepository
    )
    {
        $this->feedBackRepository = $feedBackRepo;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the FeedBack.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }


        if (!auth()->user()) {
            return redirect(route('login'));
        }




        $this->feedBackRepository->pushCriteria(new RequestCriteria($request));
        $feedBack = $this->feedBackRepository->all();

        return view('feed_back.index')
            ->with('feedBack', $feedBack);
    }

    /**
     * Show the form for creating a new FeedBack.
     *
     * @return Response
     */
    public function create()
    {
        if (auth()->user() &&  !auth()->user()->isAdmin()) {
            return redirect(route('home-user'));
        }


        if (!auth()->user()) {
            return redirect(route('login'));
        }



        $users = $this->userRepository->all();
        return view('feed_back.create')->with('users', $users);
    }

    /**
     * Store a newly created FeedBack in storage.
     *
     * @param CreateFeedBackRequest $request
     *
     * @return Response
     */
    public function store(CreateFeedBackRequest $request)
    {
        $input = $request->all();

        $feedBack = $this->feedBackRepository->create($input);

        Flash::success('Feed Back saved successfully.');
        alert()->success('Feed Back saved successfully.');

        if((auth()->check() && auth()->user()->isAdmin()) && !($request->has("from") && $request->from == "user")){
            return redirect(route('feedBack.index'));
        }else{
            return back();
        }


    }

    /**
     * Display the specified FeedBack.
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


        if (!auth()->user()) {
            return redirect(route('login'));
        }


        $feedBack = $this->feedBackRepository->findWithoutFail($id);

        if (empty($feedBack)) {
            Flash::error('Feed Back not found');

            return redirect(route('feedBack.index'));
        }

        return view('feed_back.show')->with('feedBack', $feedBack);
    }

    /**
     * Show the form for editing the specified FeedBack.
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


        if (!auth()->user()) {
            return redirect(route('login'));
        }


        $feedBack = $this->feedBackRepository->findWithoutFail($id);

        if (empty($feedBack)) {
            Flash::error('Feed Back not found');

            return redirect(route('feedBack.index'));
        }

        return view('feed_back.edit')->with('feedBack', $feedBack);
    }

    /**
     * Update the specified FeedBack in storage.
     *
     * @param  int              $id
     * @param UpdateFeedBackRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFeedBackRequest $request)
    {
        $feedBack = $this->feedBackRepository->findWithoutFail($id);

        if (empty($feedBack)) {
            Flash::error('Feed Back not found');

            return redirect(route('feedBack.index'));
        }

        $feedBack = $this->feedBackRepository->update($request->all(), $id);

        Flash::success('Feed Back updated successfully.');

        return redirect(route('feedBack.index'));
    }

    /**
     * Remove the specified FeedBack from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $feedBack = $this->feedBackRepository->findWithoutFail($id);

        if (empty($feedBack)) {
            Flash::error('Feed Back not found');

            return redirect(route('feedBack.index'));
        }

        $this->feedBackRepository->delete($id);

        Flash::success('Feed Back deleted successfully.');

        return redirect(route('feedBack.index'));
    }




    public function myfeedBack(Request $request)
    {
        $feedBack = $this->feedBackRepository->findWhere([
            "user_id" => auth()->user()->id
        ]);

        return view('feed_back.myfeedback')
            ->with('feedBacks', $feedBack);
    }



}
