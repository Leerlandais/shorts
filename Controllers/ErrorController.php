<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;

class ErrorController extends Abstract\AbstractController
{
    public function error404() {
        echo $this->twig->render('404.html.twig');
    }
}