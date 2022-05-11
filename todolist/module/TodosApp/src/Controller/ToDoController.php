<?php
namespace TodosApp\Controller;
use Laminas\View\Model\ViewModel;

class ToDoController extends \Laminas\Mvc\Controller\AbstractActionController
{
   public function indexAction(): ViewModel
   {
       $message = 'Hola desde indexAction';
       return new ViewModel(['message' => $message]);
   }
}