<?php
  function  ajouter_vues():void
  {
      $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "compteurs";
      $fichier_journalier=$fichier. " de-". date('Y-m-d');
      incrementer_compteur($fichier);
      incrementer_compteur($fichier_journalier);
       
  }
  function nombre_vues():string{
      $filePath=dirname(__DIR__) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "compteurs";
      return file_get_contents($filePath);
  }
  function incrementer_compteur($fichier):void
  {
    $compteur =1;
    if (file_exists($fichier)) 
    {
      $compteur=(int)(file_get_contents($fichier));
      $compteur++;
    }
    file_put_contents($fichier , $compteur);
  }
  function nombre_vues_mois(int $year , int $month):int
  {
    $month=str_pad($month,2,'0',STR_PAD_LEFT);
        $filePath= dirname(__DIR__) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "compteurs" . " de-" . $year . "-" .$month . "-" . "*" ;
        $fichiers=glob($filePath);
        $total=0;
        foreach ($fichiers as  $fichier) {
          $vue= (int)file_get_contents($fichier);
          $total +=$vue;
        }
        return $total;
  }
  function nombre_vues_detailler_mois(int $year , int $month):array
  {
    $month=str_pad($month,2,'0',STR_PAD_LEFT);
        $filePath= dirname(__DIR__) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "compteurs" . " de-" . $year . "-" .$month . "-" . "*" ;
        $fichiers=glob($filePath);
        $visites=[];
        foreach ($fichiers as  $fichier) 
        {
             $parties=explode("-",basename($fichier));
               $visites[]=   [
                                        'annee'=> $parties[1],
                                        'mois'=> $parties[2],
                                        'jour'=>$parties[3],
                                        'visites'=>file_get_contents($fichier)
                                    ];
        }
       return $visites;
  }
?>