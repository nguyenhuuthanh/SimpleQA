<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Requests\Api\AnswerStoreRequest;
use App\Http\Requests\Api\AnswerUpdateRequest;
use App\Repositories\AnswerRepository;
use App\Transformers\BaseTransformer;
use Dingo\Api\Exception\UpdateResourceFailedException;
use Dingo\Api\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AnswerController extends BaseController
{
    /**
     * @var AnswerRepository
     */
    protected $answerRepository;

    /**
     * AnswerController constructor.
     *
     * @param AnswerRepository $AnswerRepository
     */
    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function store(AnswerStoreRequest $request)
    {
        $answer = $this->answerRepository->setCurrentUser($this->user())->create($request->all());
        return $this->success($answer);
    }
    /**
     * @param int $id
     * @param AnswerUpdateRequest $request
     *
     * @return \Dingo\Api\Http\Response
     */
    public function update(int $id, AnswerUpdateRequest $request)
    {
        $answer = $this->find($id);
        $this->answerRepository->update($request->all(), $answer->id);
        return $this->success(null, trans('answer.updated'));
    }

    public function index(Request $request)
    {
        $limit = $this->getLimit($request);
        $paginator = $this->answerRepository->paginate($limit);
        return $this->response->paginator($paginator, new BaseTransformer());
    }
    /**
     * @param int $id
     *
     * @return \Dingo\Api\Http\Response
     */
    public function show(int $id)
    {
        return $this->success($this->find($id));
    }
    /**
     *
     * @param int $id
     *
     * @return \Dingo\Api\Http\Response
     */
    public function destroy(int $id)
    {
        $answer = $this->find($id);
        if (!$answer->delete()) {
            throw new UpdateResourceFailedException('Could not update');
        }
        return $this->success(null, trans('answer.deleted'));
    }

    /**
     * @param int $id
     * @return mixed
     */
    protected function find(int $id)
    {
        $answer = $this->answerRepository->find($id);
        if (!$answer) {
            throw new NotFoundHttpException(trans('answer.not_found'));
        }
        return $answer;
    }
}
