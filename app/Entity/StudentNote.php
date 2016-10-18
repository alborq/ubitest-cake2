<?php
namespace Entity;

class StudentNote
{
    /** @var string */
    private $category = "";

    /** @var integer */
    private $note = 0;

    /**
     * StudentNote constructor.
     * @param string $category
     * @param int $note
     */
    public function __construct($category, $note)
    {
        $this->category = $category;
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }
}
