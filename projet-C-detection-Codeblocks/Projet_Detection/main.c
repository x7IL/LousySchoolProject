#include<stdlib.h>
#include<stdio.h>
#include "structure.h"
#include "creation_infos.h"
#include "crea_struct.h"
#include "affichage.h"
#include "mon_string.h"


#define SHELLSCRIPT "\
#!/bin/bash                             \n\
#pwd                                    \n\
echo \"Copie du fichier\"               \n\
file_doc=`ls *.docx *.dotm`              \n\
for i in $file_doc                      \n\
    do                                      \n\
        cp $i general.zip                       \n\
    done                                    \n\
echo \"copie terminé\"                  \n\
unzip general.zip -d general\
"

#define SHELLSCRIPT2 "\
#!/bin/bash   \n\
cd .\.\   \n\
cd \Projet_C\n\
rm -Rf general.zip\n\
rm -Rf general\n\
"

#define SHELLSCRIPT_VBA"\
#!/bin/bash \n\
pwd \n\
mv general/word/_rels/vbaProject.bin.rels Sorti_VBA/ \n\
mv general/word/vbaData.xml Sorti_VBA \n\
mv general/word/vbaProject.bin Sorti_VBA \n\
cd Sorti_VBA \n\
ls -a \n\
"
#define SHELLSCRIPT_WORD"\
#!/bin/bash \n\
cd general \n\
zip -r Fichier_Securise * \n\
cp Fichier_Securise.zip Fichier_Securise.docx\n\
"


int main(){

    //system(SHELLSCRIPT);
    //system(SHELLSCRIPT2);
    FILE *fichier3  = fopen("les_tetes.txt", "r"); // read only
    FILE *fichier4  = fopen("les_tetes2.txt", "r"); // read only
    FILE *fichier5  = fopen("general/word/fontTable.xml", "r"); // read only
    //Partie 1

    information *tab;
    tab = creer_info();
    get_info_core(tab,"general/docProps/core.xml",fichier3);
    get_info_app(tab,"general/docProps/app.xml",fichier4);
    affichage_core(tab);
    affichage_app(tab);
    police *tab2;
    tab2 = creer_info_police(get_nombre_police());

    get_info_police(tab2,"general/word/fontTable.xml");
    affichage_police(tab2,get_nombre_police(fichier5));
    if ( test_vba()>=1){
         suppVBA();
         printf("Sorti de la macro\n");
        system(SHELLSCRIPT_VBA);
        printf("Preparation du fichier sécurisé\n");
        system(SHELLSCRIPT_WORD);
        printf("Fichier créer\n");
    }
    if (get_id_nombre()>0){
        id *tab3;
        tab3 = creer_id_stock(get_id_nombre());
        met_id_struct(tab3);
        //affichage_id_test(tab3,get_id_nombre());

        nom_id *tab4;
        tab4 = creer_nom_id_stock(get_id_nombre());
        met_nom_id_struct(tab4);
        //affichage_nom_id_test(tab4,get_id_nombre());

        nom_id_bis *tab5;
        tab5 = creer_nom_id_bis_stock(get_id_nombre());

        verifi(tab4,tab3,tab5);

        affichage_nom_id_bis_test(tab5,get_id_nombre());
        comparaison(tab4,tab5);
    }

    if (get_nombre_embed()>0){
        embed *tab6;
        tab6 = creer_embed_stock(get_nombre_embed());

        get_embed(tab6);
        //printf("ici?\n");
        Image_ID *tab7;
        //printf("1");
        tab7 = creer_image_id_stock(get_image_id_nombre());
        //printf("taille image%d\n",get_image_id());
        get_id_image(tab7);
        //affichage_image_id(tab7,get_image_id_nombre());

        Image_ID_bis *tab8;
        tab8 = creer_image_id_stock_bis(get_target_image_nombre());

        //printf("compteur %d\n",get_target_image_nombre());
        get_target_image(tab8);
        //affichage_image_id_bis(tab8,get_target_image_nombre());               //---> afficher l'id de l'image

        Image_ID_bisbis  *tab9;
        tab9 = creer_image_id_stock_bisbis(get_target_image_nombre());

        get_target_image_bis(tab9);
        //affichage_image_id_nom_bisbis(tab9,get_target_image_nombre());        //----> afficher le nom de l'image

        //char wrrd[] = "rId6\"_Type=\"http://schemas.openxmlformats.org/officeDocument/2006/relationships/image\"_Target=\"media/image1.png\"/><Relationship_Id=\"";
        //printf("longeur %d\n", strlen_iter(wrrd));
        Image_ID_bisbisbis  *tab10;
        tab10 = creer_image_id_stock_bisbisbis(get_target_image_nombre());
        //printf("test concatent\n");
        concatene(tab8,tab10);
        //printf("test concatent\n");
        //affichage_image_id_nom_bisbisbis(tab10,get_target_image_nombre());
        Image_ID_bisbisbis_lien *tab11;
        tab11 = creer_image_id_stock_bisbisbis_lien(get_target_image_nombre());
        verifi_lien(tab10,tab11);
        //affichage_image_id_nom_bisbisbis_lien(tab11,get_target_image_nombre());

        conclusion(tab9,tab11);
    }
    //printf("%d",get_nombre_embed());


    fclose(fichier3);
    fclose(fichier4);
    return EXIT_SUCCESS;
}
