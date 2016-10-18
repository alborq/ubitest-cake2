<?php

App::uses('AppModel', 'Model');
class Student extends AppModel
{
    public $name = "Student";
    public $useTable = "students";

    /**
     * Return list of Student with associated note as array
     * @return \Entity\Student[]
     */
    public function findAllStudentWithNote(){
        //Query DB
        $db = $this->getDataSource();
        $requestResult = $db->fetchAll("SELECT * FROM students AS Student LEFT OUTER JOIN student_notes AS StudentNote ON Student.id = StudentNote.student_id;");

        //Prepare result
        $result = [];
        foreach ($requestResult as $tuple){
            $studentId = $tuple['Student']['id'];

            if(false === array_key_exists($studentId, $result)){
                $student = new Entity\Student();
                $student
                    ->setId($tuple['Student']['id'])
                    ->setBirthDate(new \DateTime($tuple['Student']['birthDate']))
                    ->setGivenName($tuple['Student']['givenName'])
                    ->setFamilyName($tuple['Student']['familyName']);
                $result[$studentId] = $student;
            }

            if(null !== $tuple['StudentNote'] ['id']) {
                $note = new Entity\StudentNote(
                    $tuple['StudentNote'] ['category'],
                    $tuple['StudentNote'] ['note']
                );
                $result[$studentId]->addNote($note);
            }

        }
        return $result;
    }
}
