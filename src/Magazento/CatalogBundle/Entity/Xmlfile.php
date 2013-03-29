<?php
namespace Magazento\CatalogBundle\Entity;
use Symfony\Component\HttpFoundation\File\File;

class Xmlfile
{
    protected $file;

    public function setFile(File $file = null)
    {
        $this->$file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }
}