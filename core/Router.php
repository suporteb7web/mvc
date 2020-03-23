<?php
namespace core;

use \core\RouterBase;

class Router extends RouterBase {
    public $routes;

    public function get($endpoint, $trigger) {
        $this->routes['get'][$endpoint] = $trigger;
    }

    public function post($endpoint, $trigger) {
        $this->routes['post'][$endpoint] = $trigger;
    }

    public function put($endpoint, $trigger) {
        $this->routes['put'][$endpoint] = $trigger;
    }

    public function delete($endpoint, $trigger) {
        $this->routes['delete'][$endpoint] = $trigger;
    }

}