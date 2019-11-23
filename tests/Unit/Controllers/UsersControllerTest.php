<?php

namespace Tests\Unit;

use App\Http\Controllers\Users\UsersController;
use App\User;
use Tests\TestController;

class UsersControllerTest extends TestController
{
    protected $controller_class = UsersController::class;
    protected $parameters;

    public function setUp(): void
    {
        $this->parameters = [
            'name' => 'Cesar',
            'email' => 'valid@mail.com',
            'password' => 'random-word',
            'password_confirmation' => 'random-word',
        ];

        parent::setUp();
    }

    public function test_store_creates_user()
    {
        $this->assertDatabaseMissing('users', $this->parameters);
        $this->callStore($this->parameters);

        $this->assertDatabaseHas('users', [
            'name' => 'Cesar',
            'email' => 'valid@mail.com',
        ]);
    }
}
