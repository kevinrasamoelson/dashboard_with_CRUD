<?php
require 'generer_pdf.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design de l'ordonnance</title>
</head>
<body>

        <h1>Pharma-<span style="color:red;">MALA</span ><span style="color:green;">GASY</span></h1>
        <h3>Nom : </h3>

        <table style="width:100%">
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td><?= $pharmacie ?></td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
</table>

      



    
</body>
</html>