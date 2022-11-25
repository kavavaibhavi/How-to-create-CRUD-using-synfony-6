<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/', name: 'student', methods: ['GET'])]
    public function index(StudentRepository $studentRepository): Response
    {
//        dd($studentRepository->findAll());
        return $this->render('student/index.html.twig', [
            'students' => $studentRepository->findAll(),
        ]);
    }

    #[Route('/create', name: 'student_create', methods: ['GET','POST'])]
    public function create(Request $request,EntityManagerInterface $entityManager): Response
    {
        $student = new Student();
        $form = $this->createForm(StudentType::class);
        ($form->handleRequest($request));

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($form->getData());
            $entityManager->flush();

            return $this->redirectToRoute('student', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('student/form.html.twig',[
            'students' => $student,
            'form' => $form
        ]);
    }
    #[Route('/edit/{id}', name:"student_edit", methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager, $id): Response
    {
        $student = $entityManager->getRepository(Student::class)->findBy(array('id' => $id))[0];

        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($form->getData());
            $entityManager->flush();

            return $this->redirectToRoute('student', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('student/form.html.twig',[
            'student' => $student,
            'form' => $form
        ]);

    }

    #[Route('delete/{id}', name: 'student_delete', methods: ['GET'])]
    public function delete(Request $request, EntityManagerInterface $entityManager, $id): Response{
//        dd($id);
        $student = $entityManager->getRepository(Student::class)->findBy(array('id' => $id))[0];
        $entityManager->remove($student);
        $entityManager->flush();

        return $this->redirectToRoute('student', [], Response::HTTP_SEE_OTHER);
    }
}
