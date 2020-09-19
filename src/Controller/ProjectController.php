<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ProjectController extends AbstractController
{
     /**
     * @Route("/project", name="project")
     */
    public function index(ProjectRepository $repo) {
        $projects = $repo->findAll();
        return $this->render('project/index.html.twig', [
            'projects' => $projects
        ]);
    }

   

    /**
     * @Route("/project/new", name="project_create")
     * @Route("/project/{id}/edit", name="project_edit")
     */
    public function form(ProjectRepository $repo, $id = null, Request $request, EntityManagerInterface $entityManager) // Project $project = null, 
    {
        
        
        if(!$id) {
            $project = new Project();
        } else {
            $project = $repo->find($id);
        }
        $form = $this->createForm(ProjectType::class, $project);

        $form->handleRequest($request);

        // $entityManager = $this->getDoctrine()->getManager();

        if($form->isSubmitted() && $form->isValid()) {
            if(!$project->getId()) {
                $project->setCreatedAt(new \DateTime());
            }
            $entityManager->persist($project);
            $entityManager->flush();

            return $this->redirectToRoute('project_show', ['id' => $project->getId()]);
        }
        return $this->render('project/create.html.twig', [
            'form' => $form->createView(),
            'editMode' => $project->getId() !== null
        ]);
    }

     /**
     * @Route("/project/{id}", name="project_show")
     */
    public function show(ProjectRepository $repo,  $id)
    {
        $project = $repo->find($id);
        return $this->render('project/show.html.twig', [
            'project' => $project
        ]);
    }

    


}
