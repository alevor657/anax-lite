<?php

namespace Alvo16\Navbar;

class Navbar implements \Anax\Common\AppInjectableInterface, \Anax\Common\ConfigureInterface
{
    use \Anax\Common\AppInjectableTrait;
    use \Anax\Common\ConfigureTrait;



    /**
     * Get HTML for the navbar.
     *
     * @return string as HTML with the navbar.
     */
    public function getHTML()
    {
        $items = $this->config['items'];
        $con = $this->config['config'];
        $navbarClass = $con['navbar-class'];

        $html = "<nav class='$navbarClass' role='navigation'>";
        $html .= "<ul>";

        foreach ($items as $key => $value) {
            // Just to go around valudation problems
            $key = null;
            // That is why you validate -_-

            $url = $this->app->url->create($value['route']);
            $text = $value['text'];

            $html .= "<a href='$url'>$text</a>";
        }
        $html .= "</ul>";
        $html .= "</nav>";

        return $html;
    }
}
