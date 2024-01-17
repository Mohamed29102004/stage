<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\ImageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Repository\ImageRepository;
use Doctrine\ORM\EntityManagerInterface;

class ImageController extends AbstractController
{
    #[Route('/admin/image', name: 'app_image_index')]
    public function new(Request $request, SluggerInterface $slugger, EntityManagerInterface $em): Response
    {
        $image = new Image();
        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $Nom */
            $Nom = $form->get('Nom')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($Nom) {
                $originalFilename = pathinfo($Nom->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$Nom->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $Nom->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'Nomname' property to store the PDF file name
                // instead of its contents
                $image->setNom($newFilename);
            }
            $em->persist($image);
            $em->flush();

            // ... persist the $product variable or any other work

            return $this->redirectToRoute('app_image_list');
        }

        return $this->render('image/new.html.twig', [
            'form' => $form,
        ]);
    }
}
