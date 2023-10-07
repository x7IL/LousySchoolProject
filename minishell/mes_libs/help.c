#include "../include/mes_libs.h"

void echo_help(){
    printf("\n----------------------------\n"
           "\nNOM\n"
           "     echo - écrit les arguments sur la sortie standard\n"
           "\n"
           "SYNOPSIS\n"
           "     echo [chaîne de caractères...]\n"
           "\n"
           "DESCRIPTION\n"
           "     L'utilitaire echo écrit les opérandes spécifiés, séparés par des caractères blancs (' ') et suivis d'un caractère de retour à la ligne ('\\n'), sur la sortie standard.\n");
}

void pwd_help(){
    printf("\n----------------------------\n"
           "\nNOM\n"
           "     pwd - renvoie le nom du répertoire de travail\n"
           "\n"
           "SYNOPSIS\n"
           "     pwd\n"
           "\n"
           "DESCRIPTION\n"
           "     L'utilitaire pwd écrit le chemin d'accès absolu du répertoire de travail actuel sur la sortie standard.\n");

}

void cd_help(){
    printf("\n----------------------------\n"
           "\nNOM\n"
           "cd - changer le répertoire de travail\n"
           "\n"
           "SYNOPSIS\n"
           "    cd [répertoire]\n"
           "\n"
           "DESCRIPTION\n"
           "    L'utilitaire cd modifie le répertoire de travail de l'environnement d'exécution de l'interpréteur de commandes actuel (voir Environnement d'exécution de l'interpréteur de commandes ) en exécutant les étapes suivantes dans l'ordre. (Dans les étapes suivantes, le symbole curpath représente une valeur intermédiaire utilisée pour simplifier la description de l'algorithme utilisé par cd. Il n'est pas nécessaire que curpath soit rendu visible par l'application).\n"
           "    Si aucun opérande de répertoire n'est donné et que la variable d'environnement HOME est vide ou indéfinie, le comportement par défaut est défini par l'implémentation et aucune autre étape ne doit être effectuée.\n"
           "    Si aucun opérande de répertoire n'est donné et que la variable d'environnement HOME est définie sur une valeur non vide, l'utilitaire cd se comporte comme si le répertoire nommé dans la variable d'environnement HOME était spécifié comme opérande de répertoire.\n"
           "    .. pour reculer d'un repertoire\n");
}

void date_help(){
    printf("\n----------------------------\n"
           "\nNOM\n"
           "date - écrit la date et l'heure\n"
           "\n"
           "SYNOPSIS\n"
           "    date\n"
           "\n"
           "DESCRIPTION\n"
           "    L'utilitaire date écrit la date et l'heure sur la sortie standard ou tente de définir la date et l'heure du système. Par défaut, la date et l'heure actuelles sont écrites. Si un opérande commençant par '+' est spécifié, le format de sortie de la date sera contrôlé par les spécifications de conversion et les autres textes de l'opérande.\n");
}

void mkdir_help(){
    printf("\n----------------------------\n"
           "\nNOM\n"
           "    mkdir - créer des répertoires\n"
           "\n"
           "SYNOPSIS\n"
           "    mkdir [PATH]/[nom du fichier]\n"
           "\n"
           "DESCRIPTION\n"
           "    L'utilitaire mkdir crée les répertoires spécifiés par les opérandes, dans l'ordre indiqué.\n");
}

void head_help(){
    printf("\n----------------------------\n"
           "\nNOM\n"
           "head - copie la première partie des fichiers\n"
           "\n"
           "SYNOPSIS\n"
           "    head [fichier...] [-n nombre] \n"
           "\n"
           "DESCRIPTION\n"
           "    L'utilitaire head copie ses fichiers d'entrée sur la sortie standard, en terminant la sortie de chaque fichier à un point donné.\n"
           "\n"
           "    La copie se termine à l'endroit de chaque fichier d'entrée indiqué par l'option -n nombre. Le nombre d'arguments de l'option est compté en unités de lignes.\n");
}

void history_help(){
    printf("\n----------------------------\n"
           "\nNOM\n"
           "    history - Afficher ou manipuler la liste de l'historique.\n"
           "\n"
           "SYNOPSIS\n"
           "    history\n"
           "\n"
           "DESCRIPTION\n"
           "    Affiche la liste des 10 dernieres commandes passé\n");
}

void clear_help(){
    printf("\n----------------------------\n"
           "\nNOM\n"
           "clear - effacer l'écran du terminal.\n"
           "\n"
           "SYNOPSIS\n"
           "    clear\n"
           "\n"
           "DESCRIPTION\n"
           "    clear efface votre écran si c'est possible.\n");
}

void exit_help(){
    printf("\n----------------------------\n"
           "\nNOM\n"
           "       exit - provoque la fin normale du processus\n"
           "SYNOPSIS\n"
           "\n"
           "    exit\n"
           "\n"
           "DESCRIPTION\n"
           "       La fonction exit() provoque l'arrêt normal du processus et le\n");
}

void prompt(){
    printf("\n----------------------------\n"
           "\nNOM\n"
           "       le prompt : PS1\n"
           "SYNOPSIS\n"
           "\n"
           "    PS1=[ce que vous voulez]\n"
           "\n"
           "DESCRIPTION\n"
           "       la fonction PS1=[ce que vous voulez] vous permet de changer le prompt\n");
}

void homedirec(){
    printf("\n----------------------------\n"
           "\nNOM\n"
           "       le prompt : HOME\n"
           "SYNOPSIS\n"
           "\n"
           "    HOME=[directoire existant]\n"
           "\n"
           "DESCRIPTION\n"
           "       la fonction HOME=[directoire existant] vous permet de changer le home courant\n");
}

void lshelp() {
    printf("\n----------------------------\n"
           "\nNOM\n"
           "    ls - Afficher le contenu d'un répertoire  \n"
           "SYNOPSIS\n"
           "    ls [options] [fichier...]\n"
           "Options POSIX : [-CFRacdilqrtu1] [--]\n"
           "\n"
           "DESCRIPTION\n"
           "    La commande ls affiche tout d'abord l'ensemble de ses arguments fichiers autres que des répertoires. Puis ls affiche l'ensemble des fichiers contenus dans chaque répertoire indiqué. Si aucun argument autre qu'une option n'est fourni, l'argument « . » (répertoire en cours) est pris par défaut. "
           "    Un fichier n'est affiché que si son nom ne commence pas par un point, ou si l'option -a est fournie.\n"
           "    Chacune des listes de fichiers (fichiers autres que des répertoires, et contenu de chaque répertoire) est triée séparément en fonction de la séquence d'ordre de la localisation en cours."
           "    Lorsque l'option -l est fournie, chaque liste est précédée d'une ligne indiquant la taille totale des fichiers de la liste, exprimée en blocs de 512 ou 1024 octets.\n"
           "\n");
}

void cathelp() {
    printf("\n----------------------------\n"
           "\nNom\n"
           "    cat - concaténation de fichiers et impression sur la sortie standard\n"
           "Synopsis\n"
           "    cat FICHIER]\n"
           "Description\n"
           "    Concatène le(s) FICHIER(S), ou l'entrée standard, à la sortie standard.\n");
}

void wchelp() {
    printf("\n----------------------------\n"
           "\nNom\n"
           "    wc - affiche le nombre de lignes, de mots et d'octets pour chaque fichier\n"
           "Synopsis\n"
           "wc [FICHIER] [OPTION]\n"
           "Description\n"
           "    Affiche le nombre de nouvelles lignes avec -l, de mots avec -w et d'octets avec -c , et une ligne totale si pas d'options n'est spécifié.\n");
}

void rmhelp() {
    printf("\n----------------------------\n"
           "\nNAME\n"
           "       rm - Suppression de fichiers se trouvant dans le meme repertoire\n"
           "SYNOPSIS\n"
           "       rm [FICHIER]\n"
           "DESCRIPTION top\n"
           "    rm supprime chaque fichier spécifié. Il ne supprime pas les répertoires.\n");
}

void touchhelp() {
    printf("\n----------------------------\n"
           "\nNOM haut\n"
           "       creer un fichier\n"
           "SYNOPSIS top\n"
           "       touch FICHIER\n"
           "DESCRIPTION top\n"
           "       Un argument FILE qui n'existe pas est créé vide\n");
}

void rmdirhelp() {
    printf("\n----------------------------\n"
           "\nNAME\n"
           "       rm - Suppression de directoires se trouvant dans le meme repertoire\n"
           "SYNOPSIS\n"
           "       rm [FICHIER]\n"
           "DESCRIPTION top\n"
           "    rm supprime chaque directoire spécifié. Ne supprime pas si le dossier possede des fichiers\n");
}

void suhelp() {
    printf("\n----------------------------\n"
           "\nNOM haut\n"
           "       su - se connecte a un autre compte\n"
           "SYNOPSIS top\n"
           "       su [utilisateur] [mot de passe]\n"
           "DESCRIPTION top\n"
           "       su permet de se connecter a un autre utilisateur\n");
}

void Helpp(char *option){
    if(option[0] != '\0') {
        if (compare(option, "echo") == 0) {
            echo_help();
        } else if (compare(option, "pwd") == 0) {
            pwd_help();
        } else if (compare(option, "cd") == 0) {
            cd_help();
        } else if (compare(option, "date") == 0) {
            date_help();
        } else if (compare(option, "mkdir") == 0) {
            mkdir_help();
        } else if (compare(option, "head") == 0) {
            head_help();
        } else if (compare(option, "history") == 0) {
            history_help();
        } else if (compare(option, "clear") == 0) {
            clear_help();
        } else if (compare(option, "exit") == 0) {
            exit_help();
        } else if (compare(option, "PS1") == 0) {
            prompt();
        } else if(compare(option,"HOME") == 0) {
            homedirec();
        } else if(compare(option,"ls") == 0) {
            lshelp();
        }else if(compare(option,"cat") == 0) {
            cathelp();
        }else if(compare(option,"wc") == 0) {
            wchelp();
        }else if(compare(option,"rm") == 0) {
            rmhelp();
        }else if(compare(option,"touch") == 0) {
            touchhelp();
        }else if(compare(option,"rmdir") == 0) {
            rmdirhelp();
        }else if(compare(option,"rmdir") == 0) {
            suhelp();
        }else {
                printf("help [%s] n'existe pas", option);
            }
    }
    else{
        echo_help();
        pwd_help();
        cd_help();
        date_help();
        mkdir_help();
        head_help();
        history_help();
        clear_help();
        exit_help();
        prompt();
        homedirec();
        lshelp();
        cathelp();
        wchelp();
        rmhelp();
        touchhelp();
        rmdirhelp();
        suhelp();

    }

}


