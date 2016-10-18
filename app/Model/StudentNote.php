<?php

App::uses('AppModel', 'Model');
class StudentNote extends AppModel
{
    public $belongsTo = array(
        'Student' => array(
            'className' => 'Student',
            'foreignKey' => 'student_id'
        )
    );

    public $validate = array(
        'note' => array(
            'rule' => array('comparison', '<=', 20),
        )
    );

}
