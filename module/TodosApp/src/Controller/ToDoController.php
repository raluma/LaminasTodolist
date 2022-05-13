<?php
namespace TodosApp\Controller;

use Laminas\View\Model\ViewModel;
use TodosApp\Form\TaskForm;

class ToDoController extends \Laminas\Mvc\Controller\AbstractActionController
{
    /** @var TaskTable */
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function indexAction(): ViewModel
    {
        $tasks = $this->table->fetchAll();
        return new ViewModel(['tasks' => $tasks]);
    }

    public function createAction()
    {
        $form = new TaskForm();
        $form->get('submit')->setValue('Nueva');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $task = new Task();
        $form->setInputFilter($task->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $task->exchangeArray($form->getData());
        $this->table->saveTask($task);
        return $this->redirect()->toRoute('todos-app-index');
    }
}