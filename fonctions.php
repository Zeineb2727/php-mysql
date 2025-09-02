<?php

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