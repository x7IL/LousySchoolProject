
#include "../include/mes_libs.h"

int mon_len(const char *b){
    int a = 0;
    int i;
    for(i = 0 ; b[i]!='\0';i++){
        a++;
    }
    return a;
}

void * mon_strcpy(char *dest, const char *src){
    size_t len = sizeof(char) * mon_len(src) + 1;
    char *d = dest;
    const char *s = src;
    while (len--) {
        *d++ = *s++;
    }
    d[mon_len(d) -1] = '\0';
    return dest;
}


char *mon_strcat2(char *s, const char *append){

    if(s[0]!='\0') {
        for (; *s; ++s);
        while ((*s++ = *append++) != '\0');
    }
    return s;
}

char * mon_strcat(char *s, const char *append){
    int i = 0;
    int j;
    mon_strcat2(s," ");
    while(s[i] != '\0') i++;
    for(j = 0; append[j]!='\0'; j++){
        s[i + j] = append[j];
    }

    return s;
}

char * mon_strcat3(char *s, const char *append){
    int i = 0;
    int j;
    while(s[i] != '\0') i++;
    for(j = 0; append[j]!='\0'; j++){
        s[i + j] = append[j];
    }

    return s;
}

char *add(char *tab, char *tab2){
    char *bin = NULL;
    int i;
    bin = malloc(sizeof(char *) * 100);
    for(i = 0; i < mon_len(tab2); i++){
        bin[i] = tab2[i];
    }
    for(i = 0 ; i < mon_len(tab) + 1; i++){
        bin[i+ mon_len(tab2)] = tab[i];
    }
    return bin;
}