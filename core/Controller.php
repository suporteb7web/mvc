<?php
namespace core;

class Controller {

    private function _render($folder, $viewName, $viewData = []) {
        if(file_exists('../src/views/'.$folder.'/'.$viewName.'.php')) {
            extract($viewData);
            $render = fn($vN, $vD = []) => $this->renderPartial($vN, $vD);
            require '../src/views/'.$folder.'/'.$viewName.'.php';
        }
    }

    private function renderPartial($viewName, $viewData = []) {
        $this->_render('partials', $viewName, $viewData);
    }

    public function render($viewName, $viewData = []) {
        $this->_render('pages', $viewName, $viewData);
    }

}