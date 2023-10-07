#include "../include/mes_libs.h"

int compare(const char *tab1, const char *tab2){
    int i = 0;
    if(mon_len(tab1) != (mon_len(tab2))){
        return 1;
    }
    while(tab1[i]!= '\0'){
        if(tab1[i] != tab2[i]){
            return 1;
        }
        i++;
    }
    return 0;
}

int verifi(const char *tab){
    int i;
    int j;
    int mon_boolean = 0;
    char *commandes[] = {"exit",
                         "pwd",
                         "cd",
                         "history",
                         "ls",
                         "date",
                         "echo",
                         "head",
                         "mkdir",
                         "help",
                         "user",
                         "home",
                         "shell",
                         "PS1=",
                         "clear",
                         "cat",
                         "wc",
                         "rm",
                         "touch",
                         "rmdir",
                         "HOME=",
                         "suu",
                         "easter",
                         NULL
    };

    for(i = 0; commandes[i] != NULL; i++){
        for(j = 0; commandes[i][j]!= '\0'; j++){
            if(mon_len(commandes[i]) == mon_len(tab)) {
                if (commandes[i][j] == tab[j]) {
                    mon_boolean = 1;
                } else {
                    mon_boolean = 0;
                    break;
                }
            }
            else{
                break;
            }
        }
        if(mon_boolean == 1){
            return 1;
        }

    }
    return 0;
}

int rootperm(char * USER){
    char homee[200];
    mon_strcpy(homee, getenv("PWD"));
    mon_strcat2(homee, "/passwd.txt");
    FILE *pass = fopen(homee, "r");
    char str[256];
    while (fgets(str, sizeof(str), pass)) {
        if (compare(separateur_option(str, 0), separateur_option(USER, 0)) == 0) {
            return 745;
        }
    }
    return 999;
}