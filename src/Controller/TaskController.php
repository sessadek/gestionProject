<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaskController extends AbstractController
{
    /**
     * @Route("/task/new", name="task_create")
     * @Route("/task/{id}/edit", name="task_edit")
     */
    public function create(TaskRepository $repo, $id = null, Request $request, EntityManagerInterface $entityManager)
    {
        if(!$id) {
            $task = new Task();
        } else {
            $task = $repo->find($id);
        }
        
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if(!$task->getId()) {
                $task->setCreatedAt(new \DateTime());
            }
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('project_show', ['id' => $task->getProject()->getId()]);
        }

        return $this->render('task/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/task/{id}", name="task_show")
     */
    public function show(TaskRepository $repo,  $id)
    {
        $task = $repo->find($id);
        return $this->render('task/show.html.twig', [
            'task' => $task
        ]);
    }
}

    