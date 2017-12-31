<?php

namespace my_project\GestionLivresBundle\Services;

class MarkdownTransformer
{
    private $markdownParser;

    public function __construct($markdownParser)
    {
        $this->markdownParser = $markdownParser;
    }

    public function parse($str)
    {
        return $this->markdownParser
            ->transform($str);
    }

    public function transform($str)
    {
        strtoupper($str);
    }
}
