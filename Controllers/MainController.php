<?php

namespace Controllers;

use Controllers\Abstract\AbstractController;
use Factory\ManagerFactory;
use model\Manager\MainManager;
use Twig\Environment;

class MainController extends Abstract\AbstractController
{
    private MainManager $mainManager;
    public function __construct(Environment $twig, ManagerFactory $managerFactory)
    {
        parent::__construct($twig, $managerFactory);
        $this->mainManager = $this->getManager(MainManager::class);
    }

    public function index() : void
    {
        global $systemMessage, $sessionRole;

        if(isset($_POST["unset:shortenUrl"])) {
            $cleanedData = $this->preparePostData($_POST);
            $shortUrl = $this->mainManager->shortenUrl($cleanedData);
        }
        echo $this->twig->render('public/public.index.html.twig', [
            "systemMessage" => $systemMessage,
            "sessionRole" => $sessionRole,
            "csrfToken" => $this->csrfToken,
        ]);
    }

}