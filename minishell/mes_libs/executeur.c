

#include "../include/mes_libs.h"



int execute_cmd(char *cmd, char *option, char *HOME, char *USER){
    if(compare(cmd, "pwd") == 0){
        if(separateur_compteur_option(option) > 0) {
            printf("Trop de parametres\n");
        }
        else{
            printf("%s\n",pwd());
        }
    }
    else if(compare(cmd,"user") == 0){
        printf("%s\n",user());
    }
    else if(compare(cmd,"home") == 0){
        printf("%s\n",home());
    }
    else if(compare(cmd,"shell") == 0){
        printf("%s\n",shell());
    }
    else if(compare(cmd,"PS11=") == 0){
        return 741;
    }
    else if(compare(cmd,"HOMEE=") == 0){
        return 742;
    }
    else if(compare(cmd,"ls") == 0){
        ls(option);
    }
    else if(compare(cmd,"date") == 0){
        if(separateur_compteur_option(option) > 1) {
            printf("Trop de parametres\n");
        }
        else{
            date();
        }
    }
    else if(compare(cmd,"echo") == 0){
        printf("[%s]\n",option);
        echo(option);
    }
    else if(compare(cmd,"cd") == 0){
        if(separateur_compteur_option(option) > 1) {
            printf("Trop de parametres\n");
        }
        else{
            cd(option, HOME);
        }
    }
    else if(compare(cmd,"mkdir") == 0){
        if(separateur_compteur_option(option) > 1) {
            printf("Trop de parametres\n");
        }
        else{
            Mkdir(option);
        }
    }
    else if(compare(cmd,"help") == 0){
        if(separateur_compteur_option(option) > 2) {
            printf("Trop de parametres\n");
        }
        else{
            Helpp(option);
        }
    }
    else if(compare(cmd,"head") == 0){
        if(separateur_compteur_option(option) > 2) {
            printf("Trop de parametres\n");
        }
        else{
            head(option);
        }
    }
    else if(compare(cmd,"history") == 0){
        if(separateur_compteur_option(option) > 1) {
            printf("Trop de parametres\n");
        }
        else{
            history(option);
        }
    }
    else if(compare(cmd,"clear") == 0){
        if(separateur_compteur_option(option) > 1) {
            printf("Trop de parametres\n");
        }
        else{
            clear(option);
        }
    }
    else if(compare(cmd,"cat") == 0){
        if(separateur_compteur_option(option) > 1) {
            printf("Trop de parametres\n");
        }
        else{
            cat(option);
        }
    }
    else if(compare(cmd,"wc") == 0){
        if(separateur_compteur_option(option) > 3) {
            printf("Trop de parametres\n");
        }
        else{
            wc(option);
        }
    }
    else if(compare(cmd,"rm") == 0){
        if(separateur_compteur_option(option) > 1) {
            printf("Trop de parametres\n");
        }
        else{
            rmm(option);
        }
    }
    else if(compare(cmd,"touch") == 0){
        if(separateur_compteur_option(option) > 1) {
            printf("Trop de parametres\n");
        }
        else{
            touch(option);
        }
    }
    else if(compare(cmd,"rmdir") == 0){
        if(separateur_compteur_option(option) > 1) {
            printf("Trop de parametres\n");
        }
        else{
            Rmdir(option);
        }
    }
    else if(compare(cmd,"suu") == 0){
        if(separateur_compteur_option(option) > 2) {
            printf("Trop de parametres\n");
        }
        else if(separateur_option(option,0)[0] == '\0'){
            printf("manque l'utilisateur\n");
        }
        else if(separateur_option(option,1)[0] == '\0'){
            printf("manque le mot de passe\n");
        }
        else{
            return droit(option);
        }
    }
    else if(compare(cmd,"easter") == 0){
        /*printf("test\n");*/
        if(separateur_compteur_option(option) > 0) {
            printf("Trop de parametres\n");
        }
        else{
            if(rootperm(USER) == 745) {
                /*printf("ou\n");*/
                tuesbeau(option);
            }
            else{
                /*printf("la\n");*/
                return 779;
            }
        }
    }
    if(compare(cmd, "exit") == 0){
        if(separateur_compteur_option(option) > 0) {
            printf("Trop de parametres\n");
        }
        else{
            return 0;
        }
    }
    return 1;
}
