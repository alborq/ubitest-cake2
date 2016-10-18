<?php
namespace Entity;

class Student
{
    /** @var int|null */
    private $id = null;

    /** @var string */
    private $givenName = "";

    /** @var string */
    private $familyName = "";

    /** @var \DateTime|null */
    private $birthDate = null;

    /** @var StudentNote[] */
    private $notes = [];

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Student
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * @param string $givenName
     * @return Student
     */
    public function setGivenName($givenName)
    {
        $this->givenName = $givenName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * @param string $familyName
     * @return Student
     */
    public function setFamilyName($familyName)
    {
        $this->familyName = $familyName;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime|null $birthDate
     * @return Student
     */
    public function setBirthDate(\DateTime $birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return StudentNote[]
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param StudentNote $note
     * @return Student
     */
    public function addNote(StudentNote $note)
    {
        $this->notes [] = $note;
        return $this;
    }

    function __toString()
    {
        return $this->givenName . ' ' . $this->familyName;
    }

    public function toArray(){
        return ["Student" => [
            'id' => $this->id,
            'givenName' => $this->givenName,
            'familyName' => $this->familyName,
            'birthDate'=> $this->birthDate->format('d/m/y')
        ]];
    }
}
