<?php

namespace App\Form;

use App\Entity\Task;
use App\Entity\Status;
use App\Entity\Project;
use App\Entity\Tracker;
use App\Entity\Priority;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('startedAt', DateType::class, [
                "widget" => 'single_text',
                "format" => 'yyyy-MM-dd',
                "data" => new \DateTime()
            ])
            ->add('finishedAt', DateType::class, [
                "widget" => 'single_text',
                "format" => 'yyyy-MM-dd',
                "data" => new \DateTime()
            ])
            ->add('estimatedTime')
            ->add('spentTime')
            ->add('project', EntityType::class, [
                'class' => Project::class,
                'choice_label' => 'name'
            ])
            ->add('priority', EntityType::class, [
                'class' => Priority::class,
                'choice_label' => 'name'
            ])
            ->add('status', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'name'
            ])
            ->add('tracker', EntityType::class, [
                'class' => Tracker::class,
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
