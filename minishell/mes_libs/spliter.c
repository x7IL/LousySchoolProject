
#include "../include/mes_libs.h"

char *separateur_option(char * tab1, int l){
    int acc = 0;
    int inc = 0;
    int i;
    char *nom = malloc(sizeof (char) * mon_len(tab1)+1);
    for(i = 0; tab1[i] != '\0';i++) {
        acc += (tab1[i] == ' ') ? 1 : 0;
        if (acc == l && tab1[i] != ' ') {
            if(l == 0){
                nom[inc] = tab1[i];
            }
            else{
                nom[inc] = tab1[i];
            }
            inc++;
        }
        else if(acc > l){
            break;
        }
    }
    return nom;
}

char * separateur_commande(char * tab1, int l){
    int acc = 0;
    int inc = 0;
    int i ;
    char *nom = malloc(sizeof (char) * mon_len(tab1));
    for(i = 0; tab1[i] != '\0';i++) {
        if (acc == l && tab1[i] != ' ') {
            nom[inc] = tab1[i];
            inc++;
        }
        if(acc > l ){
            break;
        }
        acc += (tab1[i] == ' ') ? 1 : 0;
    }
    if(nom[0] == '\0'){
        return NULL;
    }
    if(separateur_compteur_option(tab1)<1) {
        nom[mon_len(nom) - 1] = '\0';
    }
    return nom;
}

int separateur_compteur_option(char *tab1){
    int acc = 0;
    int i;
    for(i = 0; tab1[i] != '\0';i++)
        acc += (tab1[i+1] == ' ') ? 1 : 0;
    return acc;
}


int sep_egale_compteur(const char *tab1){
    int acc = 0;
    int i;
    for(i = 0; tab1[i] != '\0';i++)
        acc += (tab1[i] == '=') ? 1 : 0;
    return acc;
}

char *sep_egale(char * tab1, int l){
    int acc = 0;
    int inc = 0;
    int i;
    char *nom = malloc(sizeof (char) * mon_len(tab1));
    for(i = 0; tab1[i] != '\0';i++) {
        acc += (tab1[i] == '=') ? 1 : 0;
        if (acc == l && tab1[i] != '=') {
            nom[inc] = tab1[i];
            inc++;
        }
        else if(acc > l){
            break;
        }
    }
    if(l == 0) {
        nom[mon_len(nom)] = '=';

    }
    if(l == 1) {
        nom[mon_len(nom) - 1] = '\0';
    }
    return nom;
}

int stop(char t){
    return (t ==' ') ? 1 : 0;
}

char *my_split(char * tab1, int l){
    int acc = 0;
    int inc = 0;
    int i;
    char *nom = malloc(sizeof (char) * mon_len(tab1));
    for(i = 0; tab1[i] != '\0';i++) {
        acc += (tab1[i] == ' ') ? 1 : 0;
        if (acc == l) {
            if(l == 0){
                nom[inc] = tab1[i];
            } else{
                i += stop(tab1[i]);
                nom[inc] = tab1[i];
            }
            inc++;
        } else if(acc > l){
            break;
        }
    }
    if(nom[0] == '\0')
        return NULL;
    return nom;
}