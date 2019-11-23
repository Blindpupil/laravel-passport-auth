<?php

namespace Tests\Unit;

use App\Http\Controllers\Auth\PersonalAccessTokenController;
use App\User;
use Artisan;
use Laravel\Passport\Passport;
use Laravel\Passport\Token;
use Tests\TestController;

class PersonalAccessTokenControllerTest extends TestController
{
    protected $controller_class = PersonalAccessTokenController::class;

    public function test_create_generates_token()
    {
        Artisan::call('passport:install', ['-vvv' => TRUE]);
        $user = factory(User::class)->create();

        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'email' => $user->email,
        ]);

        $response = $this->callControllerMethod('login', ['email' => $user->email, 'password' => 'password']);

        $this->assertNotEmpty($response->getData()->access_token);
    }

    public function test_logout_removes_tokens()
    {
        Artisan::call('passport:install', ['-vvv' => TRUE]);
        $user = factory(User::class)->create();
        $user->createToken('UserToken');
        Passport::actingAs($user);

        $this->assertNotEmpty(auth()->user()->tokens);
        $this->callControllerMethod('logout', []);
        $this->assertEmpty(Token::all());
    }
}
