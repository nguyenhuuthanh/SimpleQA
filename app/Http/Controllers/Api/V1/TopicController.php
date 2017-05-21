<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Requests\Api\TopicStoreRequest;
use App\Http\Requests\Api\TopicUpdateRequest;
use App\Repositories\TopicRepository;
use App\Topic;
use App\Transformers\TopicTransformer;
use Dingo\Api\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $topic = $this->find($id);
        $this->topicRepository->update($request->all(), $topic->id);
        return $this->success(null, trans('topic.updated'));
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
        $topic = $this->find($id);
        $this->topicRepository->delete($topic->id);
        return $this->success(null, trans('topic.deleted'));
    }

    /**
     * get topic object
     *
     * @param int $id
     *
     * @return mixed
     */
    protected function find(int $id)
    {
        $topic = $this->topicRepository->find($id);
        if (!$topic) {
            throw new NotFoundHttpException(trans('topic.not_found'));
        }
        return $topic;
    }
}
