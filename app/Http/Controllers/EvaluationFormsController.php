<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Exception;
use App\Http\Requests\EvaluationFormCreateRequest;
use App\Http\Requests\EvaluationFormUpdateRequest;
use App\Repositories\EvaluationFormRepository;
use App\Validators\EvaluationFormValidator;
use App\Services\EvaluationFormService;

use App\Http\Controllers\QuestionsController;
use App\Http\Requests\QuestionCreateRequest;
use App\Services\QuestionService;
use App\Repositories\QuestionRepository;


/**
 * Class EvaluationFormsController.
 *
 * @package namespace App\Http\Controllers;
 */
class EvaluationFormsController extends Controller
{
    protected $repository;
    protected $service;
    protected $questionsController;    


    public function __construct(EvaluationFormRepository $repository, EvaluationFormService $service, QuestionsController $questionsController)
    {
        $this->repository           = $repository;
        $this->service              = $service;
        $this->questionsController  = $questionsController;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('evaluationForm.index');
    }

   
    public function store(EvaluationFormCreateRequest $request)
    {

        $questions = $request->all()['questions'];
        
        $request = $this->service->store($request->all());
        $evaluationForm = $request['success'] ? $request['data'] : null;
        
        $questionsRequest = [
            'evaluation_form_id' => $evaluationForm->only('id')['id'],
            'questions' => $questions,
        ];

        $this->questionsController->store($questionsRequest);
        
        
        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages'],
        ]);   

        return redirect()->route('user.dashboard');
        /*
        return view('evaluationForm.index', [
            'evaluationForm' => $evaluationForm,
        ]);
        */
    }

    

    public function show($id)
    {
        $evaluationForm = $this->repository->find($id);
        //where('coluna', $valor)->first();

        return view('evaluationForm.show', [
            'evaluationForm' => $evaluationForm
        ]);
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
        $evaluationForm = $this->repository->find($id);

        return view('evaluationForms.edit', compact('evaluationForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EvaluationFormUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EvaluationFormUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $evaluationForm = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'EvaluationForm updated.',
                'data'    => $evaluationForm->toArray(),
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
                'message' => 'EvaluationForm deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'EvaluationForm deleted.');
    }
}
