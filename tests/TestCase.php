<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Http\Request;

abstract class TestCase extends BaseTestCase
{
    protected $request;

    public function setUp(): void
    {
        $this->createApplication();
        $this->request = new Request();
        $this->request->wantsJson();

        parent::setUp();
    }

    use CreatesApplication;
    use RefreshDatabase;
}
