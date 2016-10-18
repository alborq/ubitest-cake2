
<div class="uk-width-1-2">
    <div class="uk-panel uk-panel-box">
        <h1>Liste des Eleves</h1>
        <table class="uk-table uk-table-striped">
            <thead>
            <tr>
                <th>Eleve</th>
                <th>Date de naissance</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php  /** @var Entity\Student $student */
            foreach ($dataForView['students'] as $student) { ?>
                <tr>
                    <td><?= $student ?></td>
                    <td><?= $student->getBirthDate()->format('d/m/y') ?></td>
                    <td>
                        <a href="/?id=<?= $student->getId() ?>" class="uk-button uk-button-primary uk-button-mini">Edit</a>
                        <a href="/removeStudent?id=<?= $student->getId() ?>" class="uk-button uk-button-danger uk-button-mini">Delete</a>
                    </td>
                </tr>
                <?php /** @var Entity\StudentNote $note */
                foreach ($student->getNotes() as $note) { ?>
                    <tr>
                        <td class="uk-text-center">|-</td>
                        <td><?= $note->getCategory() ?> : <?= $note->getNote() ?> / 20</td>
                        <td></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            <?php if(0 === count($dataForView['students'] )) { ?>
                <tr><td colspan="3">Aucune donnée saisie</td></tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="uk-width-1-2">
    <div class="uk-panel uk-panel-box">
        <h1>Gérée le contenu</h1>

        <h2>Ajouter un élève</h2>
        <?= $this->Form->create('Student', [
            'class' => 'uk-form uk-form-horizontal',
            'method' => 'post',
            'url' => (!isset($this->request->data['Student']['id']))? '/addStudent' :  '/addStudent?id='.$this->request->data['Student']['id']
        ]) ?>
        <?= $this->Form->input('givenName') ?>
        <?= $this->Form->input('familyName') ?>
        <?= $this->Form->input('birthDate') ?>
        <?= $this->Form->end((!isset($this->request->data['Student']['id']))? 'Créer' : 'Editer') ?>

        <?php if(0 < count($dataForView['students'] )) { ?>
            <h2>Ajouter une note</h2>
            <?= $this->Form->create('StudentNote', [
                'class' => 'uk-form uk-form-horizontal',
                'method' => 'post',
                'url' => '/addNote'
            ]) ?>
            <?= $this->Form->input('student_id') ?>
            <?= $this->Form->input('category') ?>
            <?= $this->Form->input('note') ?>
            <?= $this->Form->end('Créer') ?>
        <?php } ?>
    </div>
</div>
