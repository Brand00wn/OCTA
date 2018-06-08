<?php
   //Inclui a classe 'class.ezpdf.php'
   include("js/pdf-php/src/Cezpdf.php");
    
   //Instancia um novo documento com o nome de pdf
   $pdf = new Cezpdf(); 
    
   //Seleciona a fonte que será usada. As fontes estão localizadas na pasta "pdf-php/fonts". Use a de sua preferencia.
   $pdf -> selectFont('pdf-php/fonts/Helvetica.afm'); 
    
   //Chama o método "ezText".
   //No 1° parametro passa o texto do documento
   //No 2° parametro define o tamanho da fonte.
   //No 3° parametro é do tipo array. A seguir uma explicação desse 3° parametro:
    
   // justification => seta a posição de um label, pode ser center, right, left, aright, ou aleft
   // leading = > define o tamanho que cada linha usará para se mostrada, deverá  ser um int
   // spacing => define o espaçamento entrelinhas, deverá ser um float
   // você pode usar apenas leading ou apenas spacing, nunca os dois

   $pdf -> ezText('DevMedia Group!', 20, array(justification => 'center', spacing => 2.0)); 
   $pdf -> ezText('Olá Pessoal. Obrigado por estarem acompanhando mais este artigo!', 15, array(justification => 'left', spacing => 3.0));
   $pdf -> ezText('Acessem o portal da DevMedia Group: www.devmedia.com.br!', 10, array(justification => 'right', spacing => 1.0));
    
   //Gera o PDF
   $pdf -> ezStream();
?>