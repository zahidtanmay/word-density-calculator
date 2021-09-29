<?php

declare(strict_types=1);

namespace App\Services;

use Html2Text\Html2Text;
//use Soundasleep\Html2Text;

class HtmlToText
{
    private $htmlToText;

    public function __construct()
    {
        $this->htmlToText = new Html2Text();
    }

    public function setUrl($url)
    {
        $this->htmlToText->setBaseUrl($url);
    }

    public function setHtml($html)
    {
        $this->htmlToText->setHtml($html);
    }

    public function getText()
    {
        return $this->htmlToText->getText();
    }

}

