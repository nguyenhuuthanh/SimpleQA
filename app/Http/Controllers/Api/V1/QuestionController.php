<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Requests\Api\QuestionStoreRequest;
use App\Repositories\QuestionRepository;
use App\Transformers\BaseTransformer;
use Dingo\Api\Http\Request;

class QuestionController extends BaseController
{
    /**
     * @var QuestionRepository
     */
    protected $questionRepository;

    /**
     * QuestionController constructor.
     *
     * @param QuestionRepository $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function store(QuestionStoreRequest $request)
    {
        $question = $this->questionRepository->setCurrentUser($this->user())->create($request->all());
        return $this->success($question);
    }

    public function index(Request $request)
    {
        $limit = $this->getLimit($request);
        $paginator = $this->questionRepository->paginate($limit);
        return $this->response->paginator($paginator, new BaseTransformer());
    }
}
