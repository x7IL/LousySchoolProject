#include "../include/mes_libs.h"

char * user(){
    return getenv("USER");
}

char * shell(){
    return getenv("SHELL");
}

char * home(){
    return getenv("HOME");
}
