#include <stdio.h>
#include <stdlib.h>

int strlen_iter(char *str_source){
    int add = 0;
    while(str_source[add] != '\0'){
        add++;
    }
    //printf("affiche taille focntion %d\n",add);
    return add;
}

int est_dans_iter(char *chai, char *cher){
    int len = strlen_iter(chai);
    int add = 0;
    int add2 = 0;
    while( add != len){
        if(chai[add] == cher[add2]){
            add++;
            add2++;
            if(cher[add2] =='\0'){
                //printf("cela s'y trouve\n");
                return add;
            }
        }
        else{
            add++;
            add2 = 0;
        }
    }
    //printf("cela ne s'y trouve pas\n");
    return -1;
}

int est_dans_iter_nb(char *chai, char *cher){
    int len = strlen_iter(chai);
    int add = 0;
    int add2 = 0;
    int add3 = 0;
    while( add < len){
        if(chai[add] == cher[add2]){
            add++;
            add2++;
            if(cher[add2] =='\0'){
                //printf("cela s'y trouve\n");
                add3++;
                //printf("--> %d\n",add3);
            }
        }
        else{
            add++;
            add2 = 0;
        }
    }
    //printf("cela ne s'y trouve pas\n");
    return add3;
}

char * get_ligne(FILE * fp){
    /* Open the file for reading */
    char *line_buf = NULL;
    size_t line_buf_size = 0;
    int line_count = 0;
    ssize_t line_size;

    /* Get the first line of the file. */
    line_size = getline(&line_buf, &line_buf_size, fp);
    line_size = getline(&line_buf, &line_buf_size, fp);
    //printf("pas ici : %s",line_buf);
    return line_buf;
    free(line_buf);

}

int isspace(int c){
    return ((c == ' ') || (c == '\n') || (c == '\t'));
}

int isunderscore(int c){
    return (c == '_');
}

int atoi (const char *nptr){
    return (int) strtol (nptr, (char **) NULL, 10);
}