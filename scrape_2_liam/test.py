




import csv
import requests

def New_CSV_site(emplacement , list_site):  # ecrit dans un csv (c'est juste plus simple)
    with open(emplacement, "w", newline='', encoding='utf-8') as f:
        for i in list_site:
            f.write(i)
def Connexion_site(dossier_csv):
    global liste_site_bon_rss
    global liste_site_bon_atom
    with open(dossier_csv, "r") as f:
        readCSV = csv.reader(f)
        for i in readCSV:
            print("lien en cours", i)
            req = requests.get("".join(i))
            if req.status_code == requests.codes.ok:
                split = req.text.split("\n")
                for i in split:
                    site = "".join(i)
                    if "rss" in i.lower() and str(site + "\n") not in liste_site_bon_rss:
                        liste_site_bon_rss.append(site + "\n")
                    if "atom" in i and str(site + "\n") not in liste_site_bon_atom:
                        liste_site_bon_atom.append(site + "\n")
                New_CSV_site("Csv_Site/site_bon_atom.csv", liste_site_bon_atom)
                New_CSV_site("Csv_Site/site_bon_rss.csv", liste_site_bon_rss)
            else:
                print("ca marche pas : ", i)