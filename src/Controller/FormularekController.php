<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
/**
 * @Route("/formularek")
 */
class FormularekController extends AbstractController
{
    /**
     * @Route("/", name="formularek", methods="GET|POST")
     */


    public function contact(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('task', TextType::class) // text input
            ->add('dueDate', DateType::class) // date select
            ->add('priority', ChoiceType::class, [ // select (dropdown)
                'choices' => [
                    'High priority' => 'high',
                    'Low priority' => 'low'
                ]
            ])
            ->add('save', SubmitType::class, ['label' => 'Create Task']) // submit
            ->getForm();


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();


        }

        return $this->render('formularek/index.html.twig', [
            'controller_name' => 'KIKOT',
            'form' => $form->createView(),
            'task' => $task ?? null,
            'priority' => $priority ?? null,
            'submittedData' => $formData ?? [],
            
        ]);
    }}
