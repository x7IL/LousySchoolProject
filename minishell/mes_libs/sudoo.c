

#include "../include/mes_libs.h"

int droit(char * option){
    if(option[0] != '\0') {
        char homee[200];
        mon_strcpy(homee, getenv("PWD"));
        mon_strcat3(homee, "/passwd.txt");
        homee[mon_len(homee)-1] = '\0';
        FILE *pass = fopen(homee, "r");
        char str[256];
        char temp[256];
        char temp2[256];
        while (fgets(str, sizeof(str), pass)) {
            if (compare(separateur_option(str, 0), separateur_option(option, 0)) == 0) {
                mon_strcpy(temp,separateur_option(option, 1));
                temp[mon_len(temp) ] = '\0';
                mon_strcpy(temp2,separateur_option(str, 1));

                if(mon_len(separateur_option(str,0)) >3) {
                    temp2[mon_len(temp2) - 1] = '\0';
                }
                /*printf("[%s]\n",temp);
                printf("[%s]\n",temp2);*/
                if (compare(temp2, temp) == 0) {
                    return 743;
                }
                else {
                    printf("mot de passe incorrecte\n");
                    return 84;
                }
            }
        }
    }
    return 778;
}