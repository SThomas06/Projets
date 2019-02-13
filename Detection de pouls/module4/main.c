#include "actions.h"

void AfficherOrdreFichierCSV(int *colonne_valeur, int *colonne_temps)
{
    int i = 0;
    while (colonne_valeur[i] != NULL)
    {
        printf("%d\t%d\n", colonne_valeur[i], colonne_temps[i]);
        i++;
    }
}

/*void RechercheAffichagePlages()
{
    int extremum_inf = 0, extremum_sup = 0;
    printf("Vous voulez afficher les valeurs sur une plage donnee :\n");
    printf("Tout d'abord entrez vos deux extremums (en secondes) : \n");
    scanf("Extremum inferieur : %d\t Extremum superieur : %d", &extremum_inf, &extremum_sup);
    extremum_inf = extremum_inf * 1000;
    extremum_sup = extremum_sup * 1000;
    int colonne_valeur[TAILLE_MAX]; // Tableau vide de taille TAILLE_MAX
    int colonne_temps[TAILLE_MAX];
    int i = 0, truc = 1;
    FILE *fichier;
    fichier = fopen("Battements.csv", "r"); // Ouverture du fichier de données généré par les pulsations du pouls

    if (fichier != NULL)    // On peut lire le fichier
    {
        while(truc != -1) //Equivaut à EOF (fin du fichier)
        {
        //Ici nous séparons le fichier reçu en deux colonne pour pouvoir utiliser les données séparement.
        truc = fscanf(fichier, "%d;%d\n", &colonne_valeur[i], &colonne_temps[i]); // On lit maximum TAILLE_MAX caractères du "fichier", on stocke le tout dans "colonne_valeur" et "colonne_temps"
            if(truc != -1)
            {
            printf("%d\t%d\n", colonne_valeur[i], colonne_temps[i]); // On affiche le fichier
            i++;
            }
        }

        fclose(fichier); // On ferme le fichier qui a été ouvert
    }
    else
    {
      printf("Ce fichier n'a pas pu etre ouvert, veuillez relancer la console.");  // On affiche un message d'erreur
    }
}

}
*/
void NombreDeLigneTotal(int a, int nb_ligne)
{
    FILE *fichier = NULL;
    fichier = fopen("Battements.csv","r");
    int a;                                 // variable qui va augmenter le nombre de ligne à chaque retour à la ligne
    int nb_ligne = 0;
    while ((a = getc(fichier*)) != EOF)
        {
            if (a == '\n')
            {
            nb_ligne++;
            }
        }
}

void RechercheMaxMinPouls()
{
    int min=1000, max=0, min_time = 0, max_time = 0; //z=0;
    int colonne_valeur[TAILLE_MAX]; // Tableau vide de taille TAILLE_MAX
    int i = 0, truc = 1;
    FILE *fichier;
    fichier = fopen("Battements.csv", "r"); // Ouverture du fichier de données généré par les pulsations du pouls

    if (fichier != NULL)    // On peut lire le fichier
    {
        while(truc != -1) //Equivaut à EOF (fin du fichier)
        {
        //Ici nous séparons le fichier reçu en deux colonne pour pouvoir utiliser les données séparement.
            truc = fscanf(fichier, "%d;%d\n", &colonne_valeur[i], &colonne_temps[i]); // On lit maximum TAILLE_MAX caractères du "fichier", on stocke le tout dans "colonne_valeur" et "colonne_temps"
            if(truc != -1)
            {
            //printf("%d\t%d\n", colonne_valeur[i], colonne_temps[i]);  On affiche le fichier, ici on n'a pas besoin de l'afficher dans la console on recherche le min et le max.
            if (colonne_valeur[i] < min){min = colonne_valeur[i]; min_time = colonne_temps[i];}
            if (colonne_valeur[i] > max){max = colonne_valeur[i]; max_time = colonne_temps[i];}
            i++;
            }
        }
    fclose(fichier); // On ferme le fichier qui a été ouvert
    printf("Recherche terminee : \n Minimum = %d au temps = %d\n Maximum = %d au temps = \n", min, min_time, max, max_time);
    }
    else
    {
      printf("Ce fichier n'a pas pu etre ouvert, la recherche du minimum et du maximum n'ont pas pu s'effectuer. Merci de verifier la présence de votre fichier CSV dans le meme dossier que ce programme");  // On affiche un message d'erreur si on veut
    }
}


void Quitter()
{
    exit(EXIT_SUCCESS);
}
