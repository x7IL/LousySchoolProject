
#include "../include/mes_libs.h"


char * pwd(){
    char lepath[1000];
    char *result;
    result = getwd(lepath);
    return result;
}

void * clear(){
    printf("\033c");        /* en hexa \x1Bc */
    return 0;
}