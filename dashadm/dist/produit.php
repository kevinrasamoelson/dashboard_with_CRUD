<!DOCTYPE html>
<html>
<head>
  <title>CRUD d'Images</title>
  <style>
    body {
      background-color: #8B4513; /* Marron */
      color: #fff; /* Couleur de texte blanc */
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
    }

    form {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"] {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
    }

    button {
      padding: 8px 16px;
      background-color: #4CAF50; /* Vert */
      color: #fff;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    #imageList {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .imageCard {
      width: 200px;
      height: 200px;
      background-color: #fff; /* Blanc */
      padding: 10px;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .imageCard img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .imageCard p {
      margin-bottom: 5px;
    }

    .imageCard button {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <h1>Modification</h1>

  <form method="post" action="create.php" enctype="multipart/form-data">
   <input type="text" name="nom" required><br><br>
   <input type="text" name="detail" required><br><br>
   <input type="number" name="prix" required><br><br>
   <input type="file" name="photo1" required><br><br>
   <input type="submit" name="submit_voiture" value="Create"><br><br>
</form>
<div><a href="read.php">voir la liste des produits</a></div>

  <div id="imageList"></div>

  <script>
    // Récupérer les éléments du formulaire
    const form = document.getElementById('imageForm');
    const nameInput = document.getElementById('name');
    const priceInput = document.getElementById('price');
    const imageInput = document.getElementById('image');

    // Récupérer la liste des images
    const imageList = document.getElementById('imageList');

    // Tableau pour stocker les images
    let images = [];

    // Fonction pour ajouter une image
    function addImage(name, price, imageSrc) {
      // Créer une carte d'image
      const imageCard = document.createElement('div');
      imageCard.classList.add('imageCard');

      // Créer une balise <img> pour afficher l'image
      const imageElement = document.createElement('img');
      imageElement.src = imageSrc;
      imageElement.alt = name;
      imageCard.appendChild(imageElement);

      // Créer un élément <p> pour afficher le nom et le prix
      const infoElement = document.createElement('p');
      infoElement.textContent = `${name} - ${price}$`;
      imageCard.appendChild(infoElement);

      // Créer un bouton pour supprimer l'image
      const deleteButton = document.createElement('button');
      deleteButton.textContent = 'Supprimer';
      deleteButton.addEventListener('click', function() {
        removeImage(imageCard);
      });
      imageCard.appendChild(deleteButton);

      // Ajouter la carte d'image à la liste des images
      imageList.appendChild(imageCard);

      // Ajouter l'image au tableau des images
      images.push({
        name: name,
        price: price,
        imageSrc: imageSrc,
        element: imageCard
      });
    }

    // Fonction pour supprimer une image
    function removeImage(imageCard) {
      // Supprimer la carte d'image de la liste des images
      imageCard.remove();

      // Supprimer l'image du tableau des images
      images = images.filter(image => image.element !== imageCard);
    }

    // Gérer la soumission du formulaire
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      // Vérifier si une image a été sélectionnée
      if (imageInput.files.length === 0) {
        alert("Veuillez sélectionner une image.");
        return;
      }

      // Récupérer les valeurs du formulaire
      const name = nameInput.value;
      const price = parseFloat(priceInput.value);
      const imageFile = imageInput.files[0];

      // Créer un objet URL pour l'image sélectionnée
      const imageSrc = URL.createObjectURL(imageFile);

      // Ajouter l'image à la liste
      addImage(name, price, imageSrc);

      // Réinitialiser le formulaire
      form.reset();
    });
  </script>
</body>
</html>