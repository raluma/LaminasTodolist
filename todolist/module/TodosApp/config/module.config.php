<?php

namespace TodosApp;

use TodosApp\Controller\ToDoController;
use Laminas\ServiceManager\Factory\InvokableFactory;


return [
   'controllers' => [
       'factories' => [
            ToDoController::class => InvokableFactory::class
        ]
   ],
   'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'template_path_stack' => [
        __DIR__ . '/../view',
        ]
   ]
];