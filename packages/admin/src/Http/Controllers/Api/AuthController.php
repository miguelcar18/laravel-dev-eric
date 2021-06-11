<?php

namespace Packages\Admin\Http\Controllers\Api;

use EllipseSynergie\ApiResponse\Contracts\Response as ApiResponse;
use Illuminate\Support\Facades\Auth;
use Packages\Admin\Transformers\Api\JWTokenTransformer;
use Packages\Admin\Transformers\Api\UserTransformer;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(ApiResponse $response)
    {
        $this->middleware('auth:api');
        $this->response = $response;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request()->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized();
        }

        return $this->response->withItem($token, new JWTokenTransformer);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return $this->response->withItem(auth('api')->user(), new UserTransformer);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return $this->response->withArray(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->response->withItem(auth('api')->refresh(), new JWTokenTransformer);
    }

}
