<?php
function afficher($var){
  print "<pre>";
    print_r($var);
  print "<pre>";
}
  function  select_day( string $name,  $value, array $data)
  {
      $html_options=[];
      $attributes="";
      foreach ($data as  $key =>$jour) {
       if ($key==$value) {
         
        $attributes="selected";
       }
       $html_options[]="<option class='form-control' value='$key' $attributes> $jour</option>";
      }
        return implode("",$html_options);
  }

  function checkbox(string $name,string $value,array $data):string
  {
    $attributes="";

    if (isset($data[$name]) && in_array($value,$data[$name])) 
    {
      $attributes="checked";
    }
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes> 
HTML;
  }
  function radio(string $name,string $value,array $data):string
  {
    $attributes="";

    if (isset($data[$name]) && ($value==$data[$name])) 
    {
      $attributes="checked";
    }
    return <<<HTML
    <input type="radio" name="{$name}[]" value="$value" $attributes> 
HTML;
  }

  function creneaux_html(array $creneaux)
  {
    if (empty($creneaux)) {
        return "fermé";
    }
      $phrase=[];
      foreach ($creneaux as $creneau) {
        $phrase[]="de <strong> {$creneau[0]}h </strong> à <strong>{$creneau[1]}h</strong> ";
  }
return 'Ouvert ' . implode(' et ',$phrase);
}
function in_creneaux($heure,$creneaux):bool
{
  foreach ($creneaux as $creneau) 
  {
    $debut=$creneau[0];
    $fin=$creneau[1];
    if ($heure>= $debut && $heure < $fin) {
      return true;
    }
  }
  return false;
}

?>