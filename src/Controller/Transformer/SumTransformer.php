<?php


namespace App\Controller\Transformers;

use App\Entity\Summary;
use App\Entity\Visit;
use Doctrine\Common\Collections\ArrayCollection;
use function Symfony\Component\String\u;

class SummaryTransformer
{
    public static function getSummary(Summary $summary,  array $omit=[] ) : array
    {

       
        return [
           
         $summary->getResult(),
          
          
        ];
    }

    /**
     * @param Summary[]|ArrayCollection|array $summary
     * @param string[] $omit
     * @return array
     */
    public static function getSum($sums,  array $omit=[]): array
    {
        $data = [];

        foreach ($sums as $i => $sum) {
            $data[] = self::getSummary($sum,$omit);
        }

        return $data;
    }

   

    

}
