<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]); //
    }

    #[Route('/showAuthor/{name}', name: 'app_author_show')]    
    public function showAuthor($name){
        return $this->render('author/show.html.twig',['esm'=>$name]);
    }


    #[Route('/showList', name: 'app_showList')]
    public function list(){
        {$authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
                'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
                ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
                'taha.hussein@gmail.com', 'nb_books' => 300),
        );
    }
    return $this->render('author/list.html.twig', ['lesAuthors' => $authors]);
}

// methode permet d'afficher la liste des auteurs

#[Route('/Affiche', name: 'app_Affiche')]
public function Affiche(AuthorRepository $authorRepository){
    $author = $authorRepository->findAll();                                  //select * from author
    return $this->render('author/Affiche.html.twig', ['Author' => $author]); //envoi des donnees a la vue
}

#[Route('/AddStatique', name: 'app_AddStatique')]
public function addStatique(EntityManagerInterface $entityManager){
             //preparation de l'objet
    $author1 = new Author();                     //insert into author () values ()
    $author1->setUsername('test');               //insert into author (username) values ('test')
    $author1->setEmail('test@gmail.com');        //insert into author (email) values ('test@gmail')

          //ajout dans la base de donnees
    $entityManager->persist($author1);           //insert into author (username,email) values ('test','test@gmail')
    $entityManager->flush();                     //execute la requete

    return $this->redirectToRoute('app_Affiche'); //redirection vers la page d'affichage
}
}
