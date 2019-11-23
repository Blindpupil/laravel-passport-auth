<?php

namespace Tests\Feature;

use App\User;
use Artisan;
use Laravel\Passport\Passport;
use Laravel\Passport\Token;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    protected $parameters;
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->parameters = [
            'email' => $this->user->email,
            'password' => 'password',
        ];
        Artisan::call('passport:install', ['-vvv' => TRUE]);
    }

    public function test_existing_user_can_get_access_token()
    {
        $response = $this->post('api/login', $this->parameters);

        $response->assertOk();
    }

    public function test_authenticated_user_can_access_blocked_apis()
    {
        Passport::actingAs($this->user);

        $response = $this->get('api/user');

        $response->assertOk();
    }

    public function test_unauthenticated_user_cant_access_blocked_apis()
    {
        // doing $this->get('api/user') auth middleware will try to redirect to login page...
        $response = $this->withHeaders(['Accept' => 'application/json'])->get('api/user');

        $response->assertUnauthorized();
    }

    public function test_authenticated_user_can_logout()
    {
        $this->post('api/login', $this->parameters);
        $this->assertNotEmpty(auth()->user()->tokens);

        Passport::actingAs($this->user);
        $response1 = $this->get('api/user');
        $response1->assertOk();

        $response2 = $this->get('api/logout');
        $response2->assertOk();
        $this->assertEmpty(Token::all());
    }
}
