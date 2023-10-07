
#include "../include/mes_libs.h"

void rmm(char * option){
    FILE * file = fopen(option,"r");
    printf("[%s]\n",option);
    if(file == NULL){
        printf("le fichier n'existe pas\n");
    }
    else{
        if(compare(directoire(option),"d") ==0 ){
            printf("ceci n'est pas un fichier, mais un dossier, veuillez supprimer ce qu'il y a à l'interieur.\n");
        }
        else {
            remove(option);
        }
    }
    fclose(file);
}

void Rmdir(char * option){
    int boolean = 0;

    DIR *rep = opendir (".");

    if (rep != NULL){
        struct dirent *lecture;
        while ((lecture = readdir(rep))){
            struct stat st;
            stat (lecture->d_name, &st);{
                if(compare(lecture->d_name,option) == 0){
                    boolean = 1;
                }
                if(boolean == 1){
                    printf("%d\n",rmdir(option));
                    rmdir(option);

                    break;
                }
            }
        }
        if(boolean == 0){
            printf("le dossier n'existe pas\n");
        }
    }
}