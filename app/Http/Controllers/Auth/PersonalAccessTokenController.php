<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Token;

class PersonalAccessTokenController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return response()->json(['message' => 'Wrong username and password'], '403');
        }

        $user = Auth::getUser();
        $personal_access_token = $user->createToken('UserToken');

        return $this->generateBearerTokenHttpResponse($personal_access_token);
    }

    public function logout()
    {
        $tokens = auth()->user()->tokens;
        $tokens->each(function (Token $token)
        {
            $token->delete();
        });
        return response()->json(['message' => 'Logged out'], 200);
    }

    protected function generateBearerTokenHttpResponse($personal_access_token)
    {
        $expires_in = $personal_access_token->token->expires_at->timestamp - Carbon::now()->timestamp;

        $responseParams = [
            'token_type' => 'Bearer',
            'expires_in' => $expires_in,
            'access_token' => $personal_access_token->accessToken,
        ];

        return response()->json($responseParams);
    }
}
