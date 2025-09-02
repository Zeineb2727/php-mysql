<?php
// Déclaration du tableau des recettes
$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 : des flageolets !',
        'author' => 'mickael.andrieu@exemple.com',
        'enabled' => true,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Etape 1 : prenez une belle escalope',
        'author' => 'mathieu.nebra@exemple.com',
        'enabled' => true,
    ],
];

// Déclaration des utilisateurs
$users = [
    ['email' => 'mickael.andrieu@exemple.com', 'full_name' => 'Mickael Andrieu', 'age' => 35],
    ['email' => 'mathieu.nebra@exemple.com', 'full_name' => 'Mathieu Nebra', 'age' => 33],
];

// LES FONCTIONS 

// FONCTION POUR RECETTE 
function isValidRecipe($recipe) {
    return isset($recipe['enabled']) && $recipe['enabled'] == true;
}

// Fonction pour récupérer les recettes valides
function getRecipes($recipes) {
    $validRecipes = [];
    foreach($recipes as $recipe) {
        if(isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }
    return $validRecipes;
}

// recuperer le nom des auteurs
function getAuthorName($authorEmail, $users) {
    foreach ($users as $user) {
        if ($user['email'] == $authorEmail) {
            return $user['full_name'] . ' (' . $user['age'] . ' ans)';
        }
    }
    return 'Auteur inconnu';
}

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
