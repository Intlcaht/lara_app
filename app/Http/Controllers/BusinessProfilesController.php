<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BusinessProfileCreateRequest;
use App\Http\Requests\BusinessProfileUpdateRequest;
use App\Repositories\Api\BusinessProfileRepository;
use App\Validators\Api\BusinessProfileValidator;

/**
 * Class BusinessProfilesController.
 *
 * @package namespace App\Http\Controllers\Api;
 */
class BusinessProfilesController extends Controller
{
    /**
     * @var BusinessProfileRepository
     */
    protected $repository;

    /**
     * @var BusinessProfileValidator
     */
    protected $validator;

    /**
     * BusinessProfilesController constructor.
     *
     * @param BusinessProfileRepository $repository
     * @param BusinessProfileValidator $validator
     */
    public function __construct(BusinessProfileRepository $repository, BusinessProfileValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $businessProfiles = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $businessProfiles,
            ]);
        }

        return view('businessProfiles.index', compact('businessProfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BusinessProfileCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BusinessProfileCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $businessProfile = $this->repository->create($request->all());

            $response = [
                'message' => 'BusinessProfile created.',
                'data'    => $businessProfile->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $businessProfile = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $businessProfile,
            ]);
        }

        return view('businessProfiles.show', compact('businessProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $businessProfile = $this->repository->find($id);

        return view('businessProfiles.edit', compact('businessProfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BusinessProfileUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BusinessProfileUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $businessProfile = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'BusinessProfile updated.',
                'data'    => $businessProfile->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'BusinessProfile deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'BusinessProfile deleted.');
    }
}
