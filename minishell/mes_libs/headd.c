
#include "../include/mes_libs.h"


void head(char * fichier){
    char str[256];
    int i = 0;
    int n = atoi(separateur_option(fichier,1));
    if(n==0){
        n=10;
    }
    FILE* ptr = fopen(separateur_option(fichier,0), "r");
    if(ptr != NULL) {
        while (fgets(str, sizeof(str), ptr)) {
            printf("%s", str);
            i++;
            if (n == i) {
                break;
            }
        }
    }
    else{
        printf("fichier introuvable ou pas dans le repertoire");
    }

    fclose(ptr);
}

void history(){

    char str[256];
    int i = 0;
    char homee[200];
    char homee2[200];
    mon_strcpy(homee,getenv("PWD"));
    mon_strcat2(homee,"/my_history.txt");
    homee[mon_len(homee) ] = '\0';
    /*printf("-->[%s]\n",homee);*/

    mon_strcpy(homee2,"my_history.txt");
    homee2[mon_len(homee2) ] = '\0';
    mon_strcat2(homee2," -l");
    homee2[mon_len(homee2) ] = '\0';

    FILE* ptr = fopen(homee, "r");
    if(ptr == NULL){
        printf("fichier bug\n");
    }
    else {
        /* printf("[%s]\n", homee2); */
        while (fgets(str, sizeof(str), ptr)) {
            i++;
            if (i >= wc2(homee2) - 10) {
                printf("%s", str);
            }
        }
    }
    fclose(ptr);
}