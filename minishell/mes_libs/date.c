

#include "../include/mes_libs.h"

void date(){
    time_t now;
    time(&now);
    printf("%s\n",ctime(&now));
    time_t seconds;
    struct tm *timeStruct;
    seconds = time(NULL);
    timeStruct = localtime(&seconds);
    printf("Current time : %d:%d:%d : %d:%d:%d\n",timeStruct->tm_yday,timeStruct->tm_wday,timeStruct->tm_year, timeStruct->tm_hour, timeStruct->tm_min, timeStruct->tm_sec);
}

void cd(char * path, char * HOME){
    printf("[%s]\n",path);
    if (path[0]=='\0'){
        chdir(HOME);
    }
    else{
        if(chdir(path) != 0){
            printf("changement raté\n");
        }
    }
}
