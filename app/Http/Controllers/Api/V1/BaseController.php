<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use Dingo\Api\Http\Request;
use Dingo\Api\Http\Response;
use Dingo\Api\Routing\Helpers;

class BaseController extends Controller
{
    use Helpers;

    const LIMIT = 'limit';
    const MAX_LIMIT = 1000;
    const DEFAULT_LIMIT = 10;

    /**
     * @param mixed $data
     * @param string|null $message
     *
     * @return Response
     */
    public function success($data = null, $message = null)
    {
        $content = [];
        if ($data !== null) {
            $content['data'] = $data;
        }
        if ($message !== null) {
            $content['message'] = $message;
        }
        return $this->response->array($content);
    }

    /**
     * @param Request $request
     * @return int
     */
    protected function getLimit(Request $request)
    {
        $limit = (int) $request->input(static::LIMIT, static::DEFAULT_LIMIT);
        if ($limit > static::MAX_LIMIT) {
            $limit = static::MAX_LIMIT;
        }
        return $limit;
    }
}
