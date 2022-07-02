<?php

namespace App\Controller;

use App\Controller\Transformers\SummaryTransformer;
use App\Entity\Summary;
use App\Repository\DataWrapper;
use App\Repository\SummaryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class SumController extends AbstractController
{
    public function makeSum(Request $request,SummaryRepository $summary) :JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $params = (object) $data;

        /* Validate Data */
        if(!$params->number1){
            return $this->json([
                'code' => '400', 
                'message' => 'Number 1 is required'
            ]);
        }
        if(!$params->number2){
            return $this->json([
                'code' => '400', 
                'message' => 'Number 2 is required'
            ]);
        }

        /* New Object to sum */
        $sum = new Summary();        
      
        $sum->setNumber1($params->number1);
        $sum->setNumber2($params->number2);
        $sum->setResult($params->number2 + $params->number1);

        $em =  $this->getDoctrine()->getManager();

        $em->persist($sum);
        $em->flush();

        /* Result Data Response */
        $results = $summary->findAll();        
        $suma = SummaryTransformer::getSum($results);  
      
        /* Response */
        return $this->json([
            'code' => 200,
            'sum'=>$sum,
            'data'=>$suma
        ]);
    }

    public function getLastsResults(SummaryRepository $summary):JsonResponse
    {
       
        $results = $summary->findAll();
        
         $suma = SummaryTransformer::getSum($results);  
        
         return $this->json(DataWrapper::createJsonResponse($suma));
      


    }
}
