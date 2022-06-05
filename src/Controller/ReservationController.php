<?php

namespace App\Controller;

use App\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class ReservationController extends AbstractController
{
    #[Route('/', name: 'app_reservation')]
    public function reservation(): Response
    {
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }
    #[Route('/home', name: 'home')]
    public function home(ManagerRegistry $doctrine,Request $request,PaginatorInterface $paginator): Response
    {
        $search =intval($request->get('search',0));
       
        if($search!=0)
        {
           
            $donneeS=$doctrine->getRepository(Reservation::class)->findBy(['id'=>$search]);
            
            return $this->render('reservation/home.html.twig', [
                'donneeS' => $donneeS,
                'search'=>$search
            ]);

        }
        else
        {

            $donnee1=$doctrine->getRepository(Reservation::class)->findAll();
            $donnee=$paginator->paginate(
                $donnee1,//Données
                $request->query->getInt('page', 1),//Numero de la page sur laquelle on est
                5 //Nombre d'éléments par page
            );
            
            $donnee1=$doctrine->getRepository(Reservation::class)->findAll();
            return $this->render('reservation/home.html.twig', [
                'controller_name' => 'ReservationController',
                'donnee'=>$donnee,
                'search'=>$search
            ]);
        }
       
    }
    #[Route('/save', name: 'save')]
    public function save(ManagerRegistry $doctrine,Request $request): Response
    {
       
       
        $date= $request->get('date','');
        $heure= $request->get('heure','');
        $nom= $request->get('nom','');
        $prenom= $request->get('prenom','');
        $compagnie= $request->get('compagnie','');
        $n_vol= $request->get('n_vol','');
        $n_bagages= $request->get('n_bagages','');
        $n_accomppagne= $request->get('n_accompagne','');
        $n_passager= $request->get('n_passager','');
        $email= $request->get('email','');
        $telephone= $request->get('telephone','');
        
        $entityManager=$doctrine->getManager();
        $reservation= new Reservation();
        $reservation->setNom($nom);
        $reservation->setPrenom($prenom);
        $reservation->setEmail($email);
        $reservation->setNAccompagne($n_accomppagne);
        $reservation->setNBagages($n_bagages);
        $reservation->setNPassager($n_passager);
        $reservation->setTelephone($telephone);
        $reservation->setCompagnie($compagnie);
        $reservation->setNVol($n_vol);
        $reservation->setDate($date);
        $reservation->setHeure($heure);

        
        $entityManager->persist($reservation);
        $entityManager->flush();

       
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'UserController',
                
                
                
               
               
       ]);
       }
      
}
