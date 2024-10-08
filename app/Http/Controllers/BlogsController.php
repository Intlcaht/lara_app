<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BlogsCreateRequest;
use App\Http\Requests\BlogsUpdateRequest;
use App\Repositories\BlogsRepository;
use App\Validators\BlogsValidator;

/**
 * Class BlogsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BlogsController extends Controller
{
    /**
     * @var BlogsRepository
     */
    protected $repository;

    /**
     * @var BlogsValidator
     */
    protected $validator;

    /**
     * BlogsController constructor.
     *
     * @param BlogsRepository $repository
     * @param BlogsValidator $validator
     */
    public function __construct(BlogsRepository $repository, BlogsValidator $validator)
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
        $blogs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $blogs,
            ]);
        }

        return view('blogs.index', compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BlogsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BlogsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $blog = $this->repository->create($request->all());

            $response = [
                'message' => 'Blogs created.',
                'data'    => $blog->toArray(),
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
        $blog = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $blog,
            ]);
        }

        return view('blogs.show', compact('blog'));
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
        $blog = $this->repository->find($id);

        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BlogsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BlogsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $blog = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Blogs updated.',
                'data'    => $blog->toArray(),
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
                'message' => 'Blogs deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Blogs deleted.');
    }
}
