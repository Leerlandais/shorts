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
            if(!$shortUrl) {
                $_SESSION["systemMessage"] = "Something went wrong creating the short url!";
                header("Location: ./");
                exit();
            }
            header("Location: ?route=shortened&url=$shortUrl");
            exit();
        }
        echo $this->twig->render('public/public.index.html.twig', [
            "systemMessage" => $systemMessage,
            "sessionRole" => $sessionRole,
            "csrfToken" => $this->csrfToken,
            "shortUrl" => $shortUrl ?? null
        ]);
    }

    public function shortened(array $getParams) : void
    {
        global $systemMessage, $sessionRole;
        $shortUrl = $getParams["url"];

        echo $this->twig->render('public/public.shortened.html.twig', [
            "systemMessage" => $systemMessage,
            "sessionRole" => $sessionRole,
            "csrfToken" => $this->csrfToken,
            "shortUrl" => $shortUrl
        ]);
    }

    public function gotoShort(array $getParams) : void
    {

        $shortUrl = $getParams["url"];
        $getLongUrl = $this->mainManager->getLongUrl($shortUrl);
        die(var_dump($getLongUrl));
        header("Location: $getLongUrl");
        exit();
    }

}