<?php
namespace Acme\Controllers;


class PageController extends BaseController
{
  
    public function getShowHomePage()
    {
        echo $this->twig->render('home.html');
    } 
    
    public function getShowPage()
    {
        echo 'Foo!';
    }
}
