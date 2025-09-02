
<?php 
include('variables.php');
include('fonctions.php'); 
?>

<!DOCTYPE html>
<html>
<head>
    <h1>Affichage des recettes</h1>
</head>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffffff;
            margin: 20px;
        }
        h1 {
            font-size: 2.5em; /* Gros titre pour la page */
            margin-bottom: 20px;
        }
        .recipe-title {
            font-size: 1.5em; /* Nom de la recette */
            font-weight: bold;
        }
        .recipe-details {
            font-size: 0.9em; /* Etapes + mail */
            color: #555;
        }
        li {
            background-color: #fff;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
            
        }
</style>

<body>
    <ul>
        <?php foreach (getRecipes($recipes) as $recipe): ?>
            <?php if ($recipe['enabled']): ?>
                <li>
                    <div class="recipe-title"><?php echo $recipe['title']; ?>  </div>
                    
                    <div class="recipe-details">
                        <?php echo $recipe['recipe']; ?><br>
                        <?php echo ' ' . getAuthorName($recipe['author'], $users); ?>
                    </div>

                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>
