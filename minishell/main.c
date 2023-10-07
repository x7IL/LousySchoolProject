
/*gcc -O3 -ansi -Wall mes_libs/checker.c mes_libs/mon_string.c mes_libs/pwdd.c mes_libs/spliter.c mes_libs/executeur.c mes_libs/echoo.c  mes_libs/userr.c mes_libs/lss.c mes_libs/date.c mes_libs/mkdirr.c mes_libs/headd.c mes_libs/help.c mes_libs/catt.c mes_libs/wcc.c mes_libs/rmm.c mes_libs/sudoo.c main.c
*/

#include "include/mes_libs.h"

char getche2() {
    struct termios oldattr, newattr;
    int ch;
    tcgetattr(STDIN_FILENO, &oldattr);
    newattr = oldattr;
    newattr.c_lflag &= ~(ICANON);
    tcsetattr(STDIN_FILENO, TCSANOW, &newattr);
    ch = getchar();
    tcsetattr(STDIN_FILENO, TCSANOW, &oldattr);
    return ch;
}

char * getche(){
    int ch = getche2();
    size_t bufsize = 556;
    char * buffer;
    char *temp = malloc(bufsize * sizeof(char) + 1);
    buffer = malloc(bufsize * sizeof(char) + 1);
    char *ph = malloc(bufsize * sizeof(char) + 1);
    int a;
    int test;
    int pointer = 0;
    if(ch =='-' || ch =='='){
        do{
            test = getche2();
            FILE *fp = fopen("my_history.txt", "r");
            fseek(fp, pointer, SEEK_SET);
            if(test == 10){
                break;
            }
            else if(test == '-') {
                fseek(fp, pointer, SEEK_SET);
                fgets(ph, sizeof(ph), fp);
                printf("%s\n",ph);
                a = mon_len(ph);
                if(a+pointer <= ftell(fp)){
                    /*printf("ftell [%ld]\n", ftell(fp));
                    printf("len du mot [%d]\n",mon_len(ph));*/
                    pointer += a;
                }
            }
            /*printf("\n%s",ph);*/
            fclose(fp);
        }while(1);
        ph[mon_len(ph)-1]='\0';
        return ph;
    }
    else if (ch == '\t'){
        do{
            ch = getche2();
            if(ch =='\t'){
                printf("pas eu le temps de terminé\n");
            }
            else if(ch == 10){
                return "RIP";
            }
        }while(1);
    }
    else{
        temp[0] = ch;
        temp[1] = '\0';
        getline(&buffer,&bufsize,stdin);
        mon_strcat2(temp,buffer);
        free(buffer);
        temp[mon_len(temp)-1] ='\0';
        return temp;
    }
}


void  INThandler(){
    char  c;
    signal(SIGINT, SIG_IGN);
    printf("\nC-trl C detecté\n"
           "voulez vous vraiment quitter? [o/n]\n");
    c = getchar();
    if (c == 'o' || c == 'O')
        exit(0);
    else {
        signal(SIGINT, INThandler);
    }
}


void shell_loop(void){
    signal(SIGINT, INThandler);
    char PS11[256] = "Esiea_shell_>";
    int i;
    char *HOMEE;
    HOMEE = getenv("HOME");
    char *USER;
    USER = getenv("USER");

    size_t bufsize = 556;

    char homee[200];
    mon_strcpy(homee,getenv("PWD"));
    mon_strcat2(homee,"/my_history.txt");

    do {
        printf("%s ",PS11);
        int status;
        char cmd[256];
        char reste[500];
        char option[500];
        char * buffer = malloc(bufsize * sizeof(char));
        int oui = 0;

        mon_strcpy(buffer,getche());
        DIR *rep = NULL;
        rep = opendir("/bin");
        struct dirent *lecture;
        while ((lecture = readdir(rep))) {
            struct stat st;
            stat(lecture->d_name, &st);{
                if(compare(lecture->d_name, separateur_commande(buffer,0)) == 0){
                    oui = 1;
                    break;
                }
            }
        }
        /*printf("%d\n",rootperm(user()));*/
        if(oui == 0 || rootperm(user()) != 745 || (compare(user(),"normal") == 0)) {
            if (compare(buffer, "\n") == 0) {
                printf("\n");
            }
            else if ((verifi(separateur_option(buffer, 0)) == 1) || (verifi(sep_egale(buffer, 0)) == 1)) {

                FILE *fp = fopen(homee, "a");
                fseek(fp, 0, SEEK_END);
                char temp4[200];
                mon_strcpy(temp4,buffer);
                mon_strcat2(temp4,"\n");
                fwrite(temp4, sizeof(char) * mon_len(temp4), sizeof(char), fp);
                fclose(fp);
                /*printf("on se trouve dans main.c [%s]\n",homee);*/

                if ((verifi(sep_egale(buffer, 0)) != 1)) {
                    mon_strcpy(cmd, separateur_option(buffer, 0));
                    mon_strcpy(option, separateur_option(buffer, 1));
                    for (i = 2; i < separateur_compteur_option(buffer) + 1; i++) {
                        mon_strcpy(reste, separateur_option(buffer, i));
                        mon_strcat(option, reste);
                        option[mon_len(option)] = '\0';
                    }
                    option[mon_len(option) - 1] = '\0';
                    /*printf("option[%s]\n", option);*/
                } else {
                    mon_strcpy(cmd, sep_egale(buffer, 0));
                    mon_strcpy(option, sep_egale(buffer, 1));
                    option[mon_len(option) - 1] = '\0';
                }
                /*printf("cmd 2 [%s]\n", separateur_commande(buffer,0));*/
                /*printf("full[%s]\n",option);*/

                int temp = execute_cmd(cmd, option, HOMEE, USER);

                if (temp == 0) {
                    printf("\nFin du Mini SHELL \n");
                    break;
                } else if (temp == 741) {
                    mon_strcpy(PS11, "");
                    option[mon_len(option)] = sep_egale(buffer, 1)[mon_len(sep_egale(buffer, 1)) - 1];
                    mon_strcpy(PS11, option);
                } else if (temp == 742) {
                    mon_strcpy(HOMEE, "");
                    option[mon_len(option)] = sep_egale(buffer, 1)[mon_len(sep_egale(buffer, 1)) - 1];
                    mon_strcpy(HOMEE, option);
                } else if (temp == 743) {
                    mon_strcpy(USER, "");
                    mon_strcpy(USER, separateur_option(option, 0));
                } else if (temp == 778) {
                    printf("superviseur introuvable\n");
                } else if (temp == 779) {
                    printf("vous n'avez pas les droits suffisant pour utiliser la commande\n");
                }
            } else {
                printf("!!! COMMANDE INVALIDE !!!\n");
            }
        }
        else{
            FILE *fp = fopen(homee, "a");
            fseek(fp, 0, SEEK_END);
            fwrite(buffer, sizeof(char) * mon_len(buffer), sizeof(char), fp);
            fclose(fp);

            char temp [ 500];
            printf("option 2\n");
            int j;
            char *temp_av[] = {
                    add(my_split(buffer, 0), "/bin/"),
                    (my_split(buffer,1) != NULL)? my_split(buffer, 1) : NULL,
                    (my_split(buffer,2) != NULL)? my_split(buffer, 2) : NULL,
                    (my_split(buffer,3) != NULL)? my_split(buffer, 3) : NULL,
                    (my_split(buffer,4) != NULL)? my_split(buffer, 4) : NULL,
                    (my_split(buffer,5) != NULL)? my_split(buffer, 5) : NULL,
                    (my_split(buffer,6) != NULL)? my_split(buffer, 6) : NULL,
                    (my_split(buffer,7) != NULL)? my_split(buffer, 7) : NULL,
                    (my_split(buffer,8) != NULL)? my_split(buffer, 8) : NULL,
                    (my_split(buffer,9) != NULL)? my_split(buffer, 9) : NULL,
                    (my_split(buffer,10) != NULL)? my_split(buffer, 10) : NULL,
                    (my_split(buffer,11) != NULL)? my_split(buffer, 11) : NULL,
                    (my_split(buffer,12) != NULL)? my_split(buffer, 12) : NULL,
                    (my_split(buffer,13) != NULL)? my_split(buffer, 13) : NULL,
                    (my_split(buffer,14) != NULL)? my_split(buffer, 14) : NULL,
                    (my_split(buffer,15) != NULL)? my_split(buffer, 15) : NULL,
                    (my_split(buffer,16) != NULL)? my_split(buffer, 16) : NULL,
                    (my_split(buffer,17) != NULL)? my_split(buffer, 17) : NULL,
                    (my_split(buffer,18) != NULL)? my_split(buffer, 18) : NULL,
                    (my_split(buffer,19) != NULL)? my_split(buffer, 19) : NULL,
                    (my_split(buffer,20) != NULL)? my_split(buffer, 20) : NULL,
                    NULL

            };
            *temp_av = malloc(sizeof(char **)* mon_len(buffer) + 1);

            for(j = 1; j < separateur_compteur_option(buffer) + 1; j++) {
                temp_av[j] = my_split(buffer, j);
                /*printf("[%s]\n",temp_av[j]);*/
            }
            temp_av[separateur_compteur_option(buffer)][mon_len(temp_av[separateur_compteur_option(buffer)]) -1] = '\0';
            /*printf("[%s]\n",temp_av[separateur_compteur_option(buffer)]);*/
            pid_t pid = fork();
            if (pid == 0) {
                access(buffer, F_OK);
                if(buffer[0] == 'c' && buffer[1] == 'd'){
                    chdir(my_split(buffer,1));
                } else {

                    mon_strcpy(temp, "/bin/");
                    mon_strcat2(temp,my_split(buffer, 0));
                    if(separateur_compteur_option(buffer) <1) {
                        temp[mon_len(temp) - 1] = '\0';
                    }
                    for(j = 1; j < separateur_compteur_option(buffer) + 1; j++) {
                        printf("[%s]\n",temp_av[j]);
                    }
                    /*printf("bin [%s]\n",temp);
                    printf("option [%s]\n",temp_av[1]);
                    printf("option [%s]\n",temp_av[2]);*/
                    execv(temp, temp_av);
                }
                break;
            }

        }
        mon_strcpy(option,"");
        mon_strcpy(cmd,"");
        wait(&status);
        reset();
    } while (1);
}


int main(){

    printf("\nMini SHELL - exit pour Quitter \n\n");
    shell_loop();

    return EXIT_SUCCESS;
}

