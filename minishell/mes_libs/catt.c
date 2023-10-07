#include "../include/mes_libs.h"

void cat(char * option){
    char str[256];
    FILE* ptr = fopen(option, "r");
    if(ptr != NULL) {
        while (fgets(str, sizeof(str), ptr)) {
            printf("%s", str);
        }
    }
    else{
        printf("le fichier n'a pas été trouvé\n");
    }
    fclose(ptr);

}