<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Repositories\QuestionRepository;
use App\Services\QuestionService;

class QuestionsController extends Controller
{
    protected $service;
    protected $repository;
 
    public function __construct(QuestionService $service, QuestionRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }


    public function index()
    {
        return view('questions.index');
    }

    public function store(array $request)
    {

        //dd($request);
        $request = $this->service->store($request);
        $questions = $request['success'] ? $request['data'] : null;

        session()->flush('success', [
            'success'  => $request['success'],
            'messages' => $request['messages'],
        ]);

        return $questions;

    }

    public function show($id)
    {
        $question = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $question,
            ]);
        }

        return view('questions.show', compact('question'));
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
        $question = $this->repository->find($id);

        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  QuestionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(QuestionUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $question = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Question updated.',
                'data'    => $question->toArray(),
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
                'message' => 'Question deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Question deleted.');
    }
}
