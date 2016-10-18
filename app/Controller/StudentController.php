<?php

App::uses('AppController', 'Controller');

class StudentController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        /** @var \Entity\Student[] $students */
        $students = $this->Student->findAllStudentWithNote();

        if(isset($this->request->query['id'])){
            $idEdit = $this->request->query['id'];
            if(true === array_key_exists($idEdit, $students)){
                $this->request->data = $students[$idEdit]->toArray();
            }
        }

        $this->set('students', $students);
    }

    public function addStudent(){
        if ($this->request->is('post') || $this->request->is('PUT')) {
            $this->Student->create();

            if(isset($this->request->query['id'])) {
                $this->Student->id = $this->request->query['id'];
            }

            if (false === $this->Student->save($this->request->data)) {
                $this->Flash->error('Erreur a la sauvegarde');
            }
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function removeStudent(){
        $this->Student->delete($this->request->query['id']);
        return $this->redirect(array('action' => 'index'));
    }

    public function addNote(){
        $this->loadModel('StudentNote');

        if ($this->request->is('post')) {
            $this->StudentNote->create();
            if (false === $this->StudentNote->save($this->request->data)) {
                $this->Flash->error('Erreur a la sauvegarde');
            }
        }
        return $this->redirect(array('action' => 'index'));
    }
}
