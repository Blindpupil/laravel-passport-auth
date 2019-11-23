<?php

namespace Tests;

class TestController extends TestCase
{
    protected $controller = NULL;
    protected $controller_class = NULL;

    public function setUp(): void
    {
        if (!is_null($this->controller_class)) $this->controller = new $this->controller_class();

        parent::setUp();
    }

    protected function callControllerMethod($method, $request_parameters, $controller_parameters = [])
    {
        $this->request->replace($request_parameters);

        return call_user_func_array(
            [$this->controller, $method],
            array_merge([$this->request], $controller_parameters)
        );
    }

    protected function callStore($store_parameters, $controller_parameters = [])
    {
        return $this->callControllerMethod('store', $store_parameters, $controller_parameters);
    }

    protected function callPatch($patch_parameters, $controller_parameters = [])
    {
        return $this->callControllerMethod('patch', $patch_parameters, $controller_parameters);
    }

    protected function callUpdate($update_parameters, $controller_parameters = [])
    {
        return $this->callControllerMethod('update', $update_parameters, $controller_parameters);
    }
}
