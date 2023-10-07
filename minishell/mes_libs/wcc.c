#include "../include/mes_libs.h"

int wc(char *option){
    int i;
    int j;

    char str[256];
    FILE* ptr = fopen(separateur_option(option,0), "r");
    int caractere = 0;
    int lignes = 0;

    if(ptr != NULL) {
        int word = 0;

        while (fgets(str, sizeof(str), ptr)) {
            for(j = 0; str[j]!='\0';j++){
                caractere++;
                if (str[j] == ' ' && str[j+1] != ' ')
                    word++;
            }
            lignes++;
        }

        if(separateur_compteur_option(option)>=1) {
            for (i = 1; i < separateur_compteur_option(option) + 1; i++) {
                if (compare(separateur_option(option, i), "-l") == 0) {
                    printf("%d\n",lignes);
                    return lignes;
                } else if (compare(separateur_option(option, i), "-w") == 0) {
                    printf("%d\n",word);
                    return word;
                } else if (compare(separateur_option(option, i), "-c") == 0) {
                    printf("%d\n",caractere);
                    return caractere;
                } else {
                    printf("l'option n'existe pas");
                }
            }
        }
        else{
            printf("lignes : %d ", lignes);
            printf("mots : %d ", word);
            printf("caracteres : %d \n", caractere);
        }
        printf("\n");
    }
    else{
        printf("le fichier n'a pas été trouvé\n");
    }
    return 0;

}

int wc2(char *option){
    int i;
    int j;

    char str[256];
    FILE* ptr = fopen(separateur_option(option,0), "r");
    int caractere = 0;
    int lignes = 0;

    if(ptr != NULL) {
        int word = 0;

        while (fgets(str, sizeof(str), ptr)) {
            for(j = 0; str[j]!='\0';j++){
                caractere++;
                if (str[j] == ' ' && str[j+1] != ' ')
                    word++;
            }
            lignes++;
        }

        if(separateur_compteur_option(option)>=1) {
            for (i = 1; i < separateur_compteur_option(option) + 1; i++) {
                if (compare(separateur_option(option, i), "-l") == 0) {
                    /*printf("%d\n",lignes);*/
                    return lignes;
                } else if (compare(separateur_option(option, i), "-w") == 0) {
                    /*printf("%d\n",word);*/
                    return word;
                } else if (compare(separateur_option(option, i), "-c") == 0) {
                    /*printf("%d\n",caractere);*/
                    return caractere;
                } else {
                    printf("l'option n'existe pas");
                }
            }
        }
        else{
            printf("lignes : %d ", lignes);
            printf("mots : %d ", word);
            printf("caracteres : %d \n", caractere);
        }
        printf("\n");
    }
    else{
        printf("le fichier n'a pas été trouvé\n");
    }
    return 0;

}