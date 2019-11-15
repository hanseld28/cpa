<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCredentialCreateRequest;
use App\Http\Requests\UserCredentialUpdateRequest;
use App\Repositories\UserCredentialRepository;
use App\Validators\UserCredentialValidator;

/**
 * Class UserCredentialsController.
 *
 * @package namespace App\Http\Controllers;
 */
class UserCredentialsController extends Controller
{
    /**
     * @var UserCredentialRepository
     */
    protected $repository;

    /**
     * @var UserCredentialValidator
     */
    protected $validator;

    /**
     * UserCredentialsController constructor.
     *
     * @param UserCredentialRepository $repository
     * @param UserCredentialValidator $validator
     */
    public function __construct(UserCredentialRepository $repository, UserCredentialValidator $validator)
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
        $userCredentials = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userCredentials,
            ]);
        }

        return view('userCredentials.index', compact('userCredentials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCredentialCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserCredentialCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $userCredential = $this->repository->create($request->all());

            $response = [
                'message' => 'UserCredential created.',
                'data'    => $userCredential->toArray(),
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
        $userCredential = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userCredential,
            ]);
        }

        return view('userCredentials.show', compact('userCredential'));
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
        $userCredential = $this->repository->find($id);

        return view('userCredentials.edit', compact('userCredential'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserCredentialUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserCredentialUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $userCredential = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'UserCredential updated.',
                'data'    => $userCredential->toArray(),
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
                'message' => 'UserCredential deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserCredential deleted.');
    }
}
