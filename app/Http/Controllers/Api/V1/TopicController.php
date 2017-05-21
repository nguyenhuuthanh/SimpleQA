<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Requests\Api\TopicStoreRequest;
use App\Http\Requests\Api\TopicUpdateRequest;
use App\Repositories\TopicRepository;
use App\Topic;
use App\Transformers\TopicTransformer;
use Dingo\Api\Http\Request;

class TopicController extends BaseController
{
    /**
     * @var TopicRepository
     */
    private $topicRepository;

    /**
     * TopicController constructor.
     *
     * @param TopicRepository $topicRepository
     */
    public function __construct(TopicRepository $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }

    /**
     * @param TopicStoreRequest $request
     *
     * @return \Dingo\Api\Http\Response
     */
    public function store(TopicStoreRequest $request)
    {
        $topic = $this->topicRepository->create($request->all());
        return $this->success($topic);
    }

    /**
     * @param int $id
     * @param TopicUpdateRequest $request
     *
     * @return \Dingo\Api\Http\Response
     */
    public function update(int $id, TopicUpdateRequest $request)
    {
        $this->topicRepository->update($request->all(), $id);
        return $this->success(null, 'Update success');
    }

    /**
     * @param Request $request
     *
     * @return \Dingo\Api\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $this->getLimit($request);
        $paginator = $this->topicRepository->paginate($limit);
        return $this->response->paginator($paginator, new TopicTransformer());
    }

    /**
     * @param int $id
     *
     * @return \Dingo\Api\Http\Response
     */
    public function show(int $id)
    {
        $topic = $this->topicRepository->find($id);
        return $this->success($topic);
    }
}
