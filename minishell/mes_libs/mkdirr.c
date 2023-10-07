#include"../include/mes_libs.h"

void touch(char *option) {
    int boolean = 0;

    DIR *rep = opendir ("." );
    if (rep != NULL){
        struct dirent *lecture;
        while ((lecture = readdir(rep))){
            struct stat st;
            stat (lecture->d_name, &st);{
                if(compare(lecture->d_name,option) == 0){
                    boolean = 1;
                }
                if(boolean == 1){
                    printf("Le nom du fichier existe deja\n");
                    break;
                }
            }
        }
        if(boolean == 0){
            FILE *fp;
            fp  = fopen (option, "w");
            fclose(fp);
        }
        closedir(rep), rep = NULL;
    }
}

void Mkdir(char * option){
    int boolean = 0;

    DIR *rep = opendir ("." );
    if (rep != NULL){
        struct dirent *lecture;
        while ((lecture = readdir(rep))){
            struct stat st;
            stat (lecture->d_name, &st);{
                if(compare(lecture->d_name,option) == 0){
                    boolean = 1;
                }
                if(boolean == 1){
                    printf("Le nom du fichier existe deja\n");
                    break;
                }
            }
        }
        if(boolean == 0){
            mkdir(option,0755);
        }
    }
}

