
#include "../include/mes_libs.h"


void mon_write(char c){
    write(1, &c, 1);
}

void echo(char const *str){
    if(str[0]!='\0'){
        int nb = 0;
        while (str[nb] != '\0') {
            mon_write(str[nb]);
            nb++;
        }
        write(1,"\n",2);
        write(1,"\n",2);
    }
    reset();
}

void tuesbeau(){
    printf("\n\n\n\n\nTU ES BG\n\n\n\n\n");
}

