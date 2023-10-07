#include "structure.h"
#include "mon_string.h"
#include <stdio.h>
#include <stdlib.h>


char* read_file_ascii(const char* path){
    FILE*fp = fopen(path, "r");
    if (!fp){
        printf("Error loading file '%s'\n",path);
        return NULL;
    }

    fseek(fp,0,SEEK_END);
    int size = ftell(fp);
    fseek(fp,0,SEEK_SET);

    char*buf = malloc(sizeof(char)*(size + 1));
    fread(buf,sizeof(char),size,fp);
    fclose(fp);

    buf[size]='\0';
    return buf;
}

void get_info_core(information *tab, const char* path1, FILE *fichier2){
    int n = 0,k = 0;
    int j, i;
    char wrd[100];

    unsigned char *str = read_file_ascii(path1);
    while(!feof(fichier2)) {
        fscanf(fichier2, " %[^\n]s\n", wrd);
        if(est_dans_iter(str,wrd)<0){
            //printf("cela ne s'y trouve pas\n");
        }
        else{
            for(j=0;j <= strlen_iter(str);j++) {
                if (j>=est_dans_iter(str,wrd)){
                    if(str[j] != '<'){
                        //printf("%c",str[j]);
                        /*
                        if (isunderscore(str[j]))
                            str[j] = ' ';*/
                        if(n==0){
                            tab->titre[k] = str[j];
                        }
                        if(n==1){
                            tab->sujet[k] = str[j];
                        }
                        if(n==2){
                            tab->creator[k] = str[j];
                        }
                        if(n==3){
                            tab->descriptions[k] = str[j];
                        }
                        if(n==4){
                            tab->dernier[k] = str[j];
                        }
                        if(n==5){
                            tab->revisions[k] = str[j];
                        }
                        if(n==6){
                            tab->creation[k] = str[j];
                        }
                        if(n==7){
                            tab->modification[k] = str[j];
                        }
                        if(n==8){
                            tab->categorie[k] = str[j];
                        }
                        if(n==9){
                            tab->langue[k] = str[j];
                        }
                        k++;
                    }
                    else{
                        n++;
                        k = 0;
                        break;
                    }
                }
            }
            //printf("\n");
            //printf("%d\n",j);
        }
    }
    free(str);
}

void get_info_app(information *tab,const char* path1,FILE *fichier4){
    int n = 0,k = 0;
    int j, i;
    //unsigned char str[5000];
    char wrd[20];

    unsigned char *str = read_file_ascii(path1);
    /*
    while (str[i]) {
        if (isspace(str[i]))

            str[i] = '_';
        i++;
    }
    */
    while (!feof(fichier4)) {
        fscanf(fichier4, " %[^\n]s\n", wrd);
        if (est_dans_iter(str, wrd) < 0) {
            //printf("cela ne s'y trouve pas\n");
        } else {
            for (j = 0; j <= strlen_iter(str); j++) {
                if (j >= est_dans_iter(str, wrd)) {
                    if (str[j] != '<') {
                        //printf("%c",str[j]);
                        if (isunderscore(str[j]))
                            str[j] = ' ';

                        if (n == 0) {
                            tab->templatee[k] = str[j];
                        }
                        if (n == 1) {
                            tab->totaltime[k] = str[j];
                        }
                        if (n == 2) {
                            tab->pages[k] = str[j];
                        }
                        if (n == 3) {
                            tab->word[k] = str[j];
                        }
                        if (n == 4) {
                            tab->charactere[k] = str[j];
                        }
                        if (n == 5) {
                            tab->application[k] = str[j];
                        }
                        if (n == 6) {
                            tab->docsecurity[k] = str[j];
                        }
                        if (n == 7) {
                            tab->lignes[k] = str[j];
                        }
                        if (n == 8) {
                            tab->paragraphe[k] = str[j];
                        }
                        if (n == 9) {
                            tab->scalecrop[k] = str[j];
                        }
                        if (n == 10) {
                            tab->manager[k] = str[j];
                        }
                        if (n == 11) {
                            tab->company[k] = str[j];
                        }
                        if (n == 12) {
                            tab->liensupdate[k] = str[j];
                        }
                        if (n == 13) {
                            tab->espace[k] = str[j];
                        }
                        if (n == 14) {
                            tab->share_doc[k] = str[j];
                        }
                        if (n == 15) {
                            tab->lienbase[k] = str[j];
                        }
                        if (n == 16) {
                            tab->lienchange[k] = str[j];
                        }
                        if (n == 17) {
                            tab->version[k] = str[j];
                        }
                        k++;
                    } else {
                        n++;
                        k = 0;
                        break;
                    }
                }
            }
        }
    }
    free(str);
}

int get_nombre_police(){
    char wrd[] = "w:name=\"";

    unsigned char *str;
    FILE *fichier3  = fopen("general/word/fontTable.xml", "r");


    str= get_ligne(fichier3);
    //printf("-->%s\n",str);
    //printf("taille %d\n",strlen_iter(str));

    //printf("FDP %d\n",est_dans_iter_nb(str,wrd));
    fclose(fichier3);

    return est_dans_iter_nb(str,wrd);

}

void get_info_police(police *tab,const char* path1){
    int l=0,k=0;
    int i,j;
    char wrd[] = "w:name=\"";
    int found;
    int p = 0;
    unsigned char *str = read_file_ascii(path1);

    //printf("\n");

    //printf("%s\n", strlen_iter(str));

    for (i = 0; i < strlen_iter(str) - strlen_iter(wrd); i++) {
        // Match word at current position
        found = 1;
        for (j = 0; j < strlen_iter(wrd); j++) {
            // If word is not matched
            if (str[i + j] != wrd[j]) {
                found = 0;
                //break;
            }
        }

        // If word have been found then print found message
        if (found == 1) {
            //printf("'%s' found at index: %d \n", wrd, i);
            while(str[i+8+k]!='"'){
                //printf("%c",str[i+8+k]);
                 tab[p].nom[k] = str[i+8+k];
                 //printf("%c",tab[p].nom[k]);
                k++;
                l++;
            }
            //printf(" %s",tab[p].nom);
            k=0;
            l=0;
            p++;
        }
    }
    free(str);
}

int get_id_nombre(){
    char wrd[] = "<w:hyperlink r:id=\"";

    unsigned char *str;
    FILE *fichier3  = fopen("general/word/document.xml", "r");


    str= get_ligne(fichier3);
    //printf("-->%s\n",str);
    //printf("taille %d\n",strlen_iter(str));

    //printf("FDP %d\n",est_dans_iter_nb(str,wrd));
    fclose(fichier3);

    return est_dans_iter_nb(str,wrd);
}

void met_id_struct(id *tab){
    int i=0,j=0;
    char wrd[] = "<w:hyperlink r:id=\"";
    int found = 0;
    int compteur = 0;
    int m=0;

    unsigned char *str = read_file_ascii("general/word/document.xml");
    //free(str);
    for (i = 0; i < strlen_iter(str) - strlen_iter(wrd); i++) {
        // Match word at current position
        found = 1;
        for (j = 0; j < strlen_iter(wrd); j++) {
            // If word is not matched
            if (str[i + j] != wrd[j]) {
                found = 0;
                break;
            }
        }
        // If word have been found then print found message
        if (found == 1) {
            //printf("'%s' found at index: %d \n", wrd, i);
            while(str[i+m+19] !='"'){
                //printf("%c",str[i+m+19]);               //<----------------------
                tab[compteur].ID[m] = str[i+m+19];
                m++;
            }
            //printf("test : %s\n",tab[compteur].ID);     //<----------------------
            m=0;
            printf("\n");
            compteur++;
        }
        found = 0;
    }
    free(str);

}

int get_nom_id_nombre(){
    int i=0,j=0,k=0,m=0;
    char wrd[] = "<w:hyperlink r:id=\"";
    char wrd2[] = "<w:t>";
    int found, found2;
    int boolean = 0;
    int compteur = 1;

    unsigned char *str = read_file_ascii("general/word/document.xml");

    for (i = 0; i < strlen_iter(str) - strlen_iter(wrd); i++) {
        // Match word at current position
        found = 1;
        for (j = 0; j < strlen_iter(wrd); j++) {
            // If word is not matched
            if (str[i + j] != wrd[j]) {
                found = 0;
                break;
            }
        }
        // If word have been found then print found message
        if (found == 1) {
            //printf("'%s' found at index: %d \n", wrd, i);
            boolean == 1;
            //printf("\n");
        }

        if (boolean == 1){
            found2 = 1;
            for (k = 0; k < strlen_iter(wrd2); k++) {
                // If word is not matched
                if (str[i + k] != wrd2[k]) {
                    found2 = 0;
                    break;
                }
            }
            if (found2 == 1) {
                //printf("'%s' found at index: %d \n", wrd2, i);

                //printf("\n");
                boolean = 0;
                compteur++;
                break;
            }
        }
    }
    free(str);
    //printf("pitié bug pas %d\n",compteur);
    return compteur;
}

void met_nom_id_struct(nom_id *tab){
    int i=0,j=0,k=0,m=0;
    char wrd[] = "<w:hyperlink r:id=\"";
    char wrd2[] = "<w:t>";
    int found, found2;
    int boolean = 0;
    int compteur = 0;

    unsigned char *str = read_file_ascii("general/word/document.xml");
    //free(str);

    for (i = 0; i < strlen_iter(str) - strlen_iter(wrd); i++) {
        // Match word at current position
        found = 1;
        for (j = 0; j < strlen_iter(wrd); j++) {
            // If word is not matched
            if (str[i + j] != wrd[j]) {
                found = 0;
                break;
            }
        }
        if (boolean == 1){
            found2 = 1;
            for (k = 0; k < strlen_iter(wrd2); k++) {
                // If word is not matched
                //printf("%d - ",i);
                if (str[i + k] != wrd2[k]) {
                    found2 = 0;
                    break;
                }
            }

            if (found2 == 1) {
                //printf("'%s' found 2found at index: %d \n", wrd2, i);
                //printf("%d-",i);
                while(str[i+m+5] != '<'){
                    //printf("%c",str[i+m+5]);

                    tab[compteur].ID_nom[m] = str[i+m+5];
                    m++;
                }
                //printf("%s\n",tab[compteur].ID_nom);
                m=0;

                //printf("\n");
                boolean = 0;
                compteur++;

            }
        }
            // If word have been found then print found message
        else if(found == 1) {
            //printf("'%s' found 1found at index: %d \n", wrd, i);
            boolean = 1;
            //printf("\n");
        }

    }
    free(str);
}

void verifi(nom_id *tab,id * tab2,nom_id_bis *tab3){
    int i=0,j=0,k=0,m=0,p=0;
    //char wrd = "Relationship Id=\"";
    char wrd2[] = "Target=\"";
    int found, found2;
    int boolean = 0;
    int compteur = 0;


    unsigned char *str = read_file_ascii("general/word/_rels/document.xml.rels");
    //printf("%p\n",str);
    //free(str);

    for(p=0;p<get_id_nombre();p++) {

        compteur=0;
        found2 = 1;
        found = 0;
        for (i = 0; i < strlen_iter(str) - strlen_iter(tab2[p].ID); i++) {
            // Match word at current position
            found = 1;
            for (j = 0; j < strlen_iter(tab2[p].ID); j++) {
                //printf("test1\n");
                // If word is not matched
                if (str[i + j] != tab2[p].ID[j]) {
                    //printf("test2\n");
                    found = 0;
                    break;
                }
            }
            if (boolean == 1) {
                found2 = 1;
                for (k = 0; k < strlen_iter(wrd2); k++) {
                    // If word is not matched
                    //printf("%d - ",i);
                    if (str[i + k] != wrd2[k]) {
                        found2 = 0;
                        break;
                    }
                }
                if (found2 == 1) {
                    //printf("'%s' found 2found at index: %d \n", wrd2, i);
                    //printf("%d-",i);
                    while (str[i + m + 8] != '"') {
                        //printf("%c",str[i+m+8]);
                        tab3[p].ID_nom_bis[m] =  str[i+m+8];

                        //tab[compteur].ID_nom[m] = str[i+m+5];
                        m++;
                    }
                    m = 0;
                    compteur++;
                    printf("\n");
                    boolean = 0;
                }
            }
                // If word have been found then print found message
            else if (found == 1) {
                //printf("'%s' found 1found at index: %d \n", tab2[p].ID, i);
                boolean = 1;
                //printf("\n");
            }
        }
    }
    //printf("%p\n",str);
    free(str);
    //printf("%p\n",str);
}

void comparaison(nom_id *tab, nom_id_bis *tab2){
    int i = 0,k = 0;
    int boolean = 0;
    int boolean2 = 0;


    for(i=0;i<get_id_nombre();i++){
        boolean = 0;
        for(k=0;k< strlen_iter(tab[i].ID_nom);k++){
            if(tab[i].ID_nom[k] == tab2[i].ID_nom_bis[k]){
                boolean = 1;
            }
            if(tab2[i].ID_nom_bis[k] == '\0'){
                boolean2 = 1;
                break;
            }
            else{
                boolean = 0;
            }
            if(boolean == 0){
                printf("Derriere \"%s\" nous retrouvons ce lien \"%s\"\n",tab[i].ID_nom,tab2[i].ID_nom_bis);
                printf("`\n");
                break;
            }
        }
        if(boolean == 1){
            printf("Ce lien \"%s\" n'est pas un lien caché\n",tab[i].ID_nom);
            printf("\n");
        }
        if(boolean2 == 1){
            printf("Ce lien \"%s\" n'est pas un lien caché\n",tab[i].ID_nom);
            printf("\n");
            boolean2 = 0;
        }
    }
}

int get_nombre_embed(){
    char wrd[]= "http://schemas.openxmlformats.org/officeDocument/2006/relationships/hyperlink\" Target=\"";

    unsigned char *str;

    str = read_file_ascii("general/word/_rels/document.xml.rels");
    //printf("taille %d\n",strlen_iter(str));

    return est_dans_iter_nb(str,wrd);

}

void get_embed(embed* tab){
    char wrd[]= "http://schemas.openxmlformats.org/officeDocument/2006/relationships/hyperlink\" Target=\"";

    unsigned char *str = read_file_ascii("general/word/_rels/document.xml.rels");

    int found, found2;
    int boolean = 0;
    int compteur = 0;
    int i,p,j,m=0;

    for (i = 0; i < strlen_iter(str) - strlen_iter(wrd); i++) {
        // Match word at current position
        found = 1;
        for (j = 0; j < strlen_iter(wrd); j++) {
            // If word is not matched
            if (str[i + j] != wrd[j]) {
                found = 0;
                break;
            }
        }
        // If word have been found then print found message
        if (found == 1) {
            //printf("'%s' found at index: %d \n", wrd, i);
            while(str[i+m+87] !='"'){
                //printf("%c",str[i+m+87]);               //<----------------------
                tab[compteur].Id_embed[m] = str[i+m+87];
                m++;
            }
            //printf("test : %s\n",tab[compteur].ID);     //<----------------------
            m=0;
            //printf("\n");
            compteur++;
        }
        found = 0;
    }
    free(str);
}

int get_image_id_nombre(){
    char wrd[]= "<Relationship Id=\"";

    unsigned char *str;

    str = read_file_ascii("general/word/_rels/document.xml.rels");
    //printf("taille %d\n",strlen_iter(str));

    return est_dans_iter_nb(str,wrd);

}

void get_id_image(Image_ID *tab){
    int i=0,j=0;
    char wrd[] = "<Relationship Id=\"";
    int found = 0;
    int compteur = 0;
    int m=0;

    unsigned char *str = read_file_ascii("general/word/_rels/document.xml.rels");
    //free(str);
    for (i = 0; i < strlen_iter(str) - strlen_iter(wrd); i++) {
        // Match word at current position
        found = 1;
        for (j = 0; j < strlen_iter(wrd); j++) {
            // If word is not matched
            if (str[i + j] != wrd[j]) {
                found = 0;
                break;
            }
        }
        // If word have been found then print found message
        if (found == 1) {
            //printf("'%s' found at index: %d \n", wrd, i);
            while(str[i+m+18] !='"'){
                //printf("%c",str[i+m+18]);               //<----------------------
                tab[compteur].ID_image[m] = str[i+m+18];
                m++;
            }
            //printf("test : %s\n",tab[compteur].ID);     //<----------------------
            m=0;
            //printf("\n");
            compteur++;
        }
        found = 0;
    }
    free(str);

}

void get_target_image(Image_ID_bis *tab){
    int i=0,j=0,k=0,m=0,jil=0;
    char wrd2[] = "<Relationship Id=\"";
    char wrd[] = "Target=\"media/";
    int found, found2;
    int boolean = 0;
    int compteur = 0;
    int compteur2 = 0;

    unsigned char *str = read_file_ascii("general/word/_rels/document.xml.rels");
    //free(str);

    for (i = 0; i < strlen_iter(str) - strlen_iter(wrd); i++) {
        // Match word at current position
        found = 1;
        for (j = 0; j < strlen_iter(wrd); j++) {
            // If word is not matched
            if (str[i + j] != wrd[j]) {
                found = 0;
                break;
            }
        }
        if (boolean == 1){
            found2 = 1;
            for (k = 0; k < strlen_iter(wrd2); k++) {
                // If word is not matched
                //printf("%d - ",i);
                if (str[i + k] != wrd2[k]) {
                    found2 = 0;
                    break;
                }
            }

            if (found2 == 1) {
                //printf("'%s' found 2found at index: %d \n", wrd2, i);
                //printf("%d-",i);
                while(str[i+m+18-132] != '"'){      //123 nombre de caracteres de  char wrrd[] = "rId6\"_Type=\"http://schemas.openxmlformats.org/officeDocument/2006/relationships/image\"_Target=\"media/image1.png\"/><Relationship_Id=\"";
                    //printf("%c",str[i+m+8]);

                    tab[compteur].ID_image_bis[m] = str[i+m+18-132];
                    m++;
                }
                //printf("%s\n",tab[compteur].ID_nom);
                m=0;

                //printf("\n");
                boolean = 0;
                compteur++;

            }
        }
            // If word have been found then print found message
        else if(found == 1) {
            //printf("'%s' found 1found at index: %d \n", wrd, i);
            compteur2 ++;

            //printf("l'id lié a l'image %s\n",wrd);
            boolean = 1;
            //printf("\n");
        }

    }
    free(str);
}

int get_target_image_nombre(){
    int i=0,j=0,k=0,m=0;
    char wrd[] = "<Relationship Id=\"";
    char wrd2[] = "Target=\"media/";
    int found, found2;
    int boolean = 0;
    int compteur = 0;

    unsigned char *str = read_file_ascii("general/word/_rels/document.xml.rels");
    //free(str);

    for (i = 0; i < strlen_iter(str) - strlen_iter(wrd); i++) {
        // Match word at current position
        found = 1;
        for (j = 0; j < strlen_iter(wrd); j++) {
            // If word is not matched
            if (str[i + j] != wrd[j]) {
                found = 0;
                break;
            }
        }
        if (boolean == 1){
            found2 = 1;
            for (k = 0; k < strlen_iter(wrd2); k++) {
                // If word is not matched
                //printf("%d - ",i);
                if (str[i + k] != wrd2[k]) {
                    found2 = 0;
                    break;
                }
            }

            if (found2 == 1) {
                //printf("'%s' found 2found at index: %d \n", wrd2, i);
                //printf("%d-",i);
                while(str[i+m+8] != '"'){
                    //printf("%c",str[i+m+8]);

                    //tab[compteur].ID_image_bis[m] = str[i+m+8];
                    m++;
                }
                //printf("%s\n",tab[compteur].ID_nom);
                m=0;

                //printf("\n");
                boolean = 0;
                compteur++;

            }
        }
            // If word have been found then print found message
        else if(found == 1) {
            //printf("'%s' found 1found at index: %d \n", wrd, i);
            boolean = 1;
            //printf("\n");
        }

    }
    free(str);
    return compteur;
}

void get_target_image_bis(Image_ID_bisbis *tab){
    int i=0,j=0,k=0,m=0,jil=0;
    char wrd[] = "<Relationship Id=\"";
    char wrd2[] = "Target=\"media/";
    int found, found2;
    int boolean = 0;
    int compteur = 0;

    unsigned char *str = read_file_ascii("general/word/_rels/document.xml.rels");
    //free(str);

    for (i = 0; i < strlen_iter(str) - strlen_iter(wrd); i++) {
        // Match word at current position
        found = 1;
        for (j = 0; j < strlen_iter(wrd); j++) {
            // If word is not matched
            if (str[i + j] != wrd[j]) {
                found = 0;
                break;
            }
        }
        if (boolean == 1){
            found2 = 1;
            for (k = 0; k < strlen_iter(wrd2); k++) {
                // If word is not matched
                //printf("%d - ",i);
                if (str[i + k] != wrd2[k]) {
                    found2 = 0;
                    break;
                }
            }

            if (found2 == 1) {
                //printf("'%s' found 2found at index: %d \n", wrd2, i);
                //printf("%d-",i);
                while(str[i+m+14] != '"'){
                    //printf("%c",str[i+m+8]);

                    tab[compteur].ID_image_bisbis[m] = str[i+m+14];
                    m++;
                }
                //printf("%s\n",tab[compteur].ID_nom);
                m=0;

                //printf("\n");
                boolean = 0;
                compteur++;

            }
        }
            // If word have been found then print found message
        else if(found == 1) {
            //printf("'%s' found 1found at index: %d \n", wrd, i);

            //printf("l'id lié a l'image %s\n",wrd);
            boolean = 1;
            //printf("\n");
        }

    }
    free(str);
}

void concatene(Image_ID_bis *tab, Image_ID_bisbisbis *tab2){
    int i,j;
    int jil=0;
    int boolean = 0;
    char test[3];
    for(i=0;i<get_target_image_nombre();i++){
        boolean = 0;
        //printf("--> %d\n",strlen_iter(tab[i].ID_image_bis));          //---> 4 test Jil.dotm
        for(j=0;j< strlen_iter(tab[i].ID_image_bis);j++) {
            if(j>1){
                tab2[i].ID_image_bisbisbis[j] = tab[i].ID_image_bis[j];
                test[jil] = tab[i].ID_image_bis[j];
                //printf("%c",test[jil]);
                jil++;
                boolean = 1;
                //printf("%s\n",tab2[i].ID_image_bisbisbis);
            }
            else {
                tab2[i].ID_image_bisbisbis[j] = tab[i].ID_image_bis[j];
                //printf("%c", tab2[i].ID_image_bisbisbis[j]);
            }
            if(boolean == 1 && j <strlen_iter(tab[i].ID_image_bis)){

                tab2[i].ID_image_bisbisbis[j] = (atoi(test)-1);

            }
        }
        //printf("\n");
        //printf("\n-->%s\n",tab2[0].ID_image_bisbisbis);
        //printf("\nDMR\n");
        //printf("\n%s",tab[i].ID_image_bis);
        //printf("\n");
    }
}

void verifi_lien(Image_ID_bisbis *tab2,Image_ID_bisbisbis_lien *tab){
    int i=0,j=0,k=0,m=0,p=0;
    //char wrd = "Relationship Id=\"";
    char wrd2[] = "Target=\"";
    int found, found2;
    int boolean = 0;
    int compteur = 0;

    unsigned char *str = read_file_ascii("general/word/_rels/document.xml.rels");
    //printf("%p\n",str);
    //free(str);
    for(p=0;p<get_target_image_nombre();p++) {

        compteur=0;
        found2 = 1;
        found = 0;
        for (i = 0; i < strlen_iter(str) - strlen_iter(tab2[p].ID_image_bisbis); i++) {
            // Match word at current position
            found = 1;
            for (j = 0; j < strlen_iter(tab2[p].ID_image_bisbis); j++) {
                //printf("test1\n");
                // If word is not matched
                if (str[i + j] != tab2[p].ID_image_bisbis[j]) {
                    //printf("test2\n");
                    found = 0;
                    break;
                }
            }
            if (boolean == 1) {
                found2 = 1;
                for (k = 0; k < strlen_iter(wrd2); k++) {
                    // If word is not matched
                    //printf("%d - ",i);
                    if (str[i + k] != wrd2[k]) {
                        found2 = 0;
                        break;
                    }
                }
                if (found2 == 1) {
                    //printf("'%s' found 2found at index: %d \n", wrd2, i);
                    //printf("%d-",i);
                    while (str[i + m + 8] != '"') {
                        //printf("%c",str[i+m+8]);
                        tab[p].ID_image_bisbisbis_lien[m] =  str[i+m+8];

                        //tab[compteur].ID_nom[m] = str[i+m+5];
                        m++;
                    }
                    m = 0;
                    compteur++;
                    //printf("\n");
                    boolean = 0;
                }
            }
                // If word have been found then print found message
            else if (found == 1) {
                //printf("'%s' found 1found at index: %d \n", tab2[p].ID_image_bisbis, i);
                boolean = 1;
                //printf("\n");
            }
        }
    }
    //printf("%p\n",str);
    free(str);
    //printf("%p\n",str);
}

void conclusion(Image_ID_bisbis *tab, Image_ID_bisbisbis_lien *tab2){
    int i;
    for(i=0;i<get_target_image_nombre();i++){
        printf("l'image : %s = %s\n",tab[i].ID_image_bisbis,tab2[i].ID_image_bisbisbis_lien);
    }
    //system("mkdir resumer");
    //system("rm -R resumer");

}

void suppVBA(){
    int j=0;
    int i;
    unsigned char *str = read_file_ascii("general/word/_rels/document.xml.rels");
    char str2[1000000];
    char wrd[] = "<Relationship Id=\"rId1\" Type=\"http://schemas.microsoft.com/office/2006/relationships/vbaProject\" Target=\"vbaProject.bin\"/>";
    //printf("%d\n", strlen_iter(str));
    //printf("%d\n", est_dans_iter(str,wrd));     //342 //122 // 464
    //removeAll(str,wrd);
    printf("Macro detected...\n");
    printf("Processing\n");

    for(i=0;i< strlen_iter(str);i++){
        if(i>=(strlen_iter(str) - est_dans_iter(str,wrd)) -122 && j<122){
            j++;
            //str2[i] = str[i];
            //printf("%c",str2[i]);
        }
        else{
            str2[i-j] = str[i];
            //printf("%c",str2[i-j]);
        }
    }
    //printf("\n%s",str2);
    //printf("\n%d", strlen_iter(str2));
    //printf("--> %s\n",str2);
    FILE *fichier2  = fopen("general/word/_rels/document.xml.rels", "w");
    fwrite(str2, 1, strlen_iter(str2), fichier2);
    //printf("--> %s\n",str);
    printf("Macro has bee deleted\n");
    printf("No macro detected\n");
    fclose(fichier2);
}

int test_vba(){
     char wrd[] = "<Relationship Id=\"rId1\" Type=\"http://schemas.microsoft.com/office/2006/relationships/vbaProject\" Target=\"vbaProject.bin\"/>";
     unsigned char * str  = read_file_ascii("general/word/_rels/document.xml.rels");
     return est_dans_iter(str,wrd);
}
