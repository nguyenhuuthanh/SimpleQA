<?php


namespace App\Http\Controllers\Api\V1;


use Dingo\Api\Http\Request;
use Dingo\Api\Http\Response;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends BaseController
{
    /**
     * Authenticate user. Authenticate user by `email` and `password`.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function login(Request $request): Response
    {
        $credentials = $request->only('email', 'password');
        $token = '';
        try {
            $token = JWTAuth::attempt($credentials);
            if (!$token) {
                $this->response->errorUnauthorized('Invalid email or password');
            }
        } catch (JWTException $exception) {
            $this->response->errorUnauthorized('Authentication error: ' . $exception->getMessage());
        }
        $user = JWTAuth::user();

        return $this->success([
            'token' => $token,
            'user' => $user,
        ]);
    }

    /**
     * Logout user. Invalidate access token
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
        } catch (TokenExpiredException $ex) {
            // still continue remove device token and response success if token is expired.
            \Log::debug("Token is expired");
        } catch (TokenInvalidException $e) {
            $this->response->errorUnauthorized('The token is invalid');
        }
        //$this->deviceRepository->destroy($request->input('device_token') ?? '');
        return $this->success(null, 'Good bye!');
    }
}
