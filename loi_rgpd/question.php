<!DOCTYPE html>
<html>
    <head>
        <title>Aide RGPD</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <style>
            body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        </style>
    </head>

    <body class="w3-light-grey">

        <a href="index.php">Retour à la page d'accueil</a>

        <br><br>
        <form action="#" method="post" id="form_reponse">
            <div class="div_question" style="margin-left: 10%;margin-right: 10%; min-width: 60%">
                <div class="w3-card-4 w3-margin w3-white" style="padding-left: 2%;padding-right: 2%">
                    <h1>Protection règles victime</h1>
                    <hr>


                    <h6>Applique pas</h6>
                    <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_applique_pas').style.display = 'block'">\/</a>
                    <br>
                    <div id="r_applique_pas" style="display: none;">
                        <input type="checkbox" id="r1_applique_pas" value="" required oninvalid="this.setCustomValidity('Votre traitement n\'est pas conforme si vous ne cochez pas cette case!')">
                        <label for="r1_applique_pas">Activité qui ne relève pas du champs d’application de l’Union</label><br>

                        <input type="checkbox" id="r2_applique_pas" value="" required>
                        <label for="r2_applique_pas">Par les autorités compétantes (détections, préventions d’infractions pénales..)</label><br>

                        <input type="checkbox" id="r3_applique_pas" value="" required>
                        <label for="r3_applique_pas">Dans le cadre d’une activités personnelles ou domestiques.</label><br>

                        <input type="checkbox" id="r4_applique_pas" value="" required>
                        <label for="r4_applique_pas">Par les états membres dans le cas d’une activités du « chapitre 2 du titre V du traité sur l'Union européenne »</label>
                    </div>


                    <h5>Applique</h5>
                    <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_applique').style.display = 'block'; document.getElementById('cacherApplique').style.display = 'block';">\/</a>
                    <br>
                    <div id="r_applique" style="display: none;">
                        <input type="radio" name="r_applique[]" id="r1_applique" value="">
                        <label for="r1_applique">A la responsabilité des prestataires de services intermédiaires.</label><br>

                        <input type="radio" name="r_applique[]" id="r2_applique" value="">
                        <label for="r2_applique">Au traitement des données à caractère personnel relatives aux condamnations pénales et aux infractions ne peut être effectué que sous le contrôle de l’autorité publique, par le droit de l’Union, le droit d’un État membre</label><br>

                        <input type="radio" name="r_applique[]" id="r3_applique" value="">
                        <label for="r3_applique">Aux personnes concernées dans l'Union, qu'un paiement soit exigé ou non desdites personnes, au suivi du comportement de ces personnes (Article3)</label><br>

                        <input type="radio" name="r_applique[]" id="r4_applique" value="">
                        <label for="r4_applique">Aux institutions, organes et organismes de l'Union.</label><br>
                    </div>


                    <div id="cacherApplique" style="display: none;">
                        <h6>Les données</h6>
                        <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_donnees').style.display = 'block'">\/</a>
                        <br>
                        <div id="r_donnees" style="display: none;">
                            <input type="checkbox" id="r1_donnees" value="" required>
                            <label for="r1_donnees">Doivent etre traités de manière licite, loyal et transparente</label><br>

                            <input type="checkbox" id="r2_donnees" value="" required>
                            <label for="r2_donnees">Doivent etre collectées pour des finalités déterminées, explicites et légitimes, et ne pas être traitées ultérieurement d'une manière incompatible avec ces finalités</label><br>

                            <input type="checkbox" id="r3_donnees" value="" required>
                            <label for="r3_donnees">Doivent etre dans l'intérêt public, à des fins de recherche scientifique ou historique ou à des fins statistiques (pas considéré comme incompatible)</label><br>

                            <input type="checkbox" id="r4_donnees" value="" required>
                            <label for="r4_donnees">Doivent etre adéquates, pertinentes et limitées à ce qui est nécessaire</label><br>

                        </div>


                        <h6>Les Contrat</h6>
                        <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_contrat').style.display = 'block'">\/</a>
                        <br>
                        <div id="r_contrat" style="display: none">
                            <input type="radio" id="r1_contrat" value="" >
                            <label for="r1_contrat">La personne concernée a consenti au traitement de ses données à caractère personne</label><br>

                            <input type="radio" id="r2_contrat" value="">
                            <label for="r2_contrat">Le traitement est nécessaire à l'exécution d'un contrat, d'une obligation légale,  à la sauvegarde des intérêts vitaux, l'exécution d'une mission d'intérêt public ou relevant de l'exercice de l'autorité publique (Article 6)</label><br>

                        </div>


                        <h6>Les traitement licite</h6>
                        <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_traitement_licite').style.display = 'block'">\/</a>
                        <br>
                        <div id="r_traitement_licite" style="display: none">
                            <input type="checkbox" id="r1_traitement_licite" value="" required>
                            <label for="r1_traitement_licite">Le traitement des données à caractère personnel ne révèle pas l'origine raciale, ethnique,religieuses, données génétiques,biométriques, concernant la santé,vie sexuelle/orientation -> interdit(Article 9)</label><br>

                            <input type="checkbox" id="r2_traitement_licite" value="" required>
                            <label for="r2_traitement_licite">Le traitement est nécessaire à la sauvegarde des intérêts vitaux</label><br>

                            <input type="checkbox" id="r3_traitement_licite" value="" required>
                            <label for="r3_traitement_licite">Si les données son manifestement rendues publiques par la personne concernée</label><br>

                            <input type="checkbox" id="r4_traitement_licite" value="" required>
                            <label for="r4_traitement_licite">Si ces données sont traitées par un professionnel soumis à une obligation de secret professionnel</label><br>
                        </div>


                        <h6>Le consentement</h6>
                        <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_consentement').style.display = 'block'">\/</a>
                        <br>
                        <div id="r_consentement" style="display: none">
                            <input type="checkbox" id="r1_consentement" value="" required>
                            <label for="r1_consentement">Si, consentement accessible, comprehensible et formuler de avec terme clair et simple (article 7)</label><br>

                            <input type="checkbox" id="r2_consentement" value="" required>
                            <label for="r2_consentement">Possibiliteé de retirer le consentement (article 7)</label><br>

                            <input type="checkbox" id="r3_consentement" value="" required>
                            <label for="r3_consentement">Accord d'un responsable legal et un moyen de verifier que ca soit bien le responsable legal pour les mineurs de moins de 15 ans</label><br>

                        </div>
                    </div>


                    <h2>Responsable de traitement</h2>

                    <h3>Consultation préalable</h3>
                    <a href="#" style="text-decoration: none" onfocus="document.getElementById('consultation_prealable').style.display = 'block'">\/</a>
                    <br>
                    <div id="consultation_prealable" style="display: none">

                        <h4>Accessibilité des données</h4>
                        <a href="#" style="text-decoration: none" onfocus="document.getElementById('accessibilite_donnees').style.display = 'block'; document.getElementById('r_Accessibilite').style.display = 'block'">\/</a>
                        <br>
                        <div id="accessibilite_donnees" style="display: none">

                                <input type="checkbox" id="r1_Accessibilite" value="" required>
                                <label for="r1_Accessibilite">L'identité et les coordonnées du responsable du traitement</label><br>


                                <h5>Obtention donnees a caractere personnel</h5>
                                <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_Obtention_donnees').style.display = 'block'">\/</a>
                                <br>
                                <div id="r_Obtention_donnees" style="display: none">
                                    <input type="checkbox" id="r1_Obtention" value="" required>
                                    <label for="r1_Obtention">Pouvoir fournir la durée de conservation des données à caractère personnel</label><br>

                                    <input type="checkbox" id="r2_Obtention" value="" required>
                                    <label for="r2_Obtention">Fournir l'existence du droit de demander au responsable du traitement l'accès aux données à caractère personnel</label><br>

                                    <input type="checkbox" id="r3_Obtention" value="" required>
                                    <label for="r3_Obtention">Pourvoir founir la possibilitée de rectifier ou d'effacer celles-ci.</label><br>

                                    <input type="checkbox" id="r4_Obtention" value="" required>
                                    <label for="r4_Obtention">Le droit d'introduire une réclamation auprès d'une autorité de contrôle. (Article 13)</label><br>

                                    <input type="checkbox" id="r5_Obtention" value="" required>
                                    <label for="r5_Obtention">Donner la confirmation que des données à caractère personnel la concernant sont ou ne sont pas traitées (Article 15)</label><br>

                                    <input type="checkbox" id="r6_Obtention" value="" required>
                                    <label for="r6_Obtention">Droit d’obtenir dans les plus brefs délais rectification des données à caractère personnel la concernant qui sont inexactes & incomplètes soient complétées, y compris en fournissant une déclaration complémentaire. (Article 16)</label><br>

                                    <input type="checkbox" id="r7_Obtention" value="" required>
                                    <label for="r7_Obtention">La personne concernée a le droit d'obtenir du responsable du traitement la limitation du traitement</label><br>

                                    <input type="checkbox" id="r8_Obtention" value="" required>
                                    <label for="r8_Obtention">Le responsable du traitement a l'obligation d'effacer ces données à caractère personnel dans les meilleurs délaiss</label><br>

                                    <input type="checkbox" id="r9_Obtention" value="" required>
                                    <label for="r9_Obtention">Obligation de notification en ce qui concerne la rectification ou l'effacement de données à caractère personnel ou la limitation du traitement</label><br>

                                    <input type="checkbox" id="r10_Obtention" value="" required>
                                    <label for="r10_Obtention">Les personnes concernées ont le droit de recevoir les données à caractère personnel les concernant qu'elles ont fournies à un responsable du traitement, dans un format structuré, couramment utilisé et lisible par machine, elle a le droit d'obtenir que les données à caractère personnel soient transmises directement d'un responsable du traitement à un autrePourvoir founir la possibilitée de rectifier ou d'effacer celles-ci.</label><br>

                                    <input type="checkbox" id="r11_Obtention" value="" required>
                                    <label for="r11_Obtention">La personne concernée a le droit de s'opposer à tout moment, pour des raisons tenant à sa situation particulière</label><br>
                                </div>

                                <h5>Recupération donnees a caractere personnel autre personne</h5>
                                <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_recupration_donnees').style.display = 'block'">\/</a>
                                <br>
                                <div id="r_recupration_donnees" style="display: none">

                                    <input type="checkbox" id="r1_Recupration" value="" required>
                                    <label for="r1_Recupration">Pouvoir fournir l'identité et les coordonnées du responsable du traitement et, le cas échéant, du représentant du responsable du traitement;</label><br>

                                    <input type="checkbox" id="r2_Recupration" value="" required>
                                    <label for="r2_Recupration">Pouvoir fournir le cas échéant, les coordonnées du délégué à la protection des données</label><br>

                                    <input type="checkbox" id="r3_Recupration" value="" required>
                                    <label for="r3_Recupration">Pouvoir fournir le cas échéant, les coordonnées du délégué à la protection des données</label><br>

                                    <input type="checkbox" id="r4_Recupration" value="" required>
                                    <label for="r4_Recupration">Pouvoir fournir les catégories de données à caractère personnel concernées</label><br>

                                    <input type="checkbox" id="r5_Recupration" value="" required>
                                    <label for="r5_Recupration">Pouvoir founir le cas échéant, les destinataires ou les catégories de destinataires des données à caractère personnel</label><br>
                                    <br>
                                </div>
                            <hr style="size: 2em; color: black;">

                                <input type="checkbox" id="r2_Accessibilite" value=""  required>
                                <label for="r2_Accessibilite">Le responsable du traitement prend des mesures appropriées pour fournir toute information visée, d’une façon concise, transparente, compréhensible et aisément accessible, en des termes clairs et simples (Article 12)</label><br>

                                <input type="checkbox" id="r3_Accessibilite" value=""  required>
                                <label for="r3_Accessibilite">Etre en mesure de démontrer que le traitement est effectué conformément au présent règlement. Ces mesures sont réexaminées et actualisées si nécessaire. (Article 24)</label><br>

                                <input type="checkbox" id="r4_Accessibilite" value="" required>
                                <label for="r4_Accessibilite">Le responsable du traitement met en œuvre, tant au moment de la détermination des moyens du traitement qu'au moment du traitement lui-même : telles que la pseudonymisation, minimisation des données.</label><br>

                                <input type="checkbox" id="r5_Accessibilite" value="" required>
                                <label for="r5_Accessibilite">Seules les données à caractère personnel qui sont nécessaires au regard de chaque finalité sont traitées. Cela s'applique à la quantité de données à caractère personnel collectées, à l'étendue de leur traitement, à leur durée de conservation et à leur accessibilité</label><br>

                                <input type="checkbox" id="r6_Accessibilite" value="" required>
                                <label for="r6_Accessibilite">Consentement à l'accessibilité a un nombre indeterminé de personnes des donnees a caractere personnel la concernant</label><br>

                                <input type="checkbox" id="r7_Accessibilite" value="" required>
                                <label for="r7_Accessibilite">Le cas échéant, le représentant du responsable du traitement/sous traitant/responsable du traitement doivent tenir un registre des activités de traitement effectuées.</label><br>

                                <input type="checkbox" id="r8_Accessibilite" value="" required>
                                <label for="r8_Accessibilite">Mettre en œuvre les mesures techniques et organisationnelles appropriées afin de garantir un niveau de sécurité adapté au risque (a) la pseudonymisation et le chiffrement des données à caractère personnel;,b) des moyens permettant de garantir la confidentialité, l'intégrité, la disponibilité et la résilience constantes des systèmes et des services de traitement;,c) des moyens permettant de rétablir la disponibilité des données à caractère personnel et l'accès à celles-ci dans des délais appropriés en cas d'incident physique ou technique;,d) une procédure visant à tester, à analyser et à évaluer régulièrement l'efficacité des mesures techniques et organisationnelles pour assurer la sécurité du traitement</label><br>

                                <input type="checkbox" id="r9_Accessibilite" value="" required>
                                <label for="r9_Accessibilite">Mesures afin de garantir que toute personne physique agissant sous l'autorité du responsable du traitement/sous-traitants, ne les traite pas, excepté sur instruction du responsable du traitement, à moins d'y être obligée par le droit de l'Union ou le droit d'un État membre. (Article 32)</label><br>

                                <input type="checkbox" id="r10_Accessibilite" value="" required>
                                <label for="r10_Accessibilite">Lorsqu'une violation de données à caractère personnel est susceptible d'engendrer un risque élevé pour les droits et libertés d'une personne physique, le responsable du traitement communique la violation de données à caractère personnel à la personne concernée dans les meilleurs délais.(Article 34)</label><br>


                                <h4>Analyse impact relative protection d'une obligation légale, d'intérêt public ou relevant de l'exercice de l'autorité publique</h4>

                                <a href="#" style="text-decoration: none" onfocus="document.getElementById('Analyse_impact_relative').style.display = 'block'">\/</a>
                                <br>
                                <div id="Analyse_impact_relative" style="display: none">

                                <h6>Requis</h6>
                                <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_risque_eleve').style.display = 'block'">\/</a>
                                <br>
                                <div id="r_risque_eleve" style="display: none">

                                    <input type="checkbox" id="r1_requis" value=""  required>
                                    <label for="r1_requis">L'évaluation systématique et approfondie d'aspects personnels concernant des personnes physiques, qui est fondée sur un traitement automatisé, y compris le profilage, et sur la base de laquelle sont prises des décisions produisant des effets juridiques à l'égard d'une personne physique ou l'affectant de manière significative de façon similaire</label><br>

                                    <input type="checkbox" id="r2_requis" value="" required>
                                    <label for="r2_requis">Le traitement à grande échelle de catégories particulières de données visées à l'article 9, paragraphe 1 (qui révèle l'origine raciale ou ethnique, les opinions politiques, les convictions religieuses ou philosophiques ou l'appartenance syndicale, ainsi que le traitement des données génétiques, des données biométriques), ou de données à caractère personnel relatives à des condamnations pénales et à des infractions visée</label><br>

                                    <input type="checkbox" id="r3_requis" value="" required>
                                    <label for="r3_requis">La surveillance systématique à grande échelle d'une zone accessible au public.</label><br>
                                </div>

                                <h6>Pas mesure risque eleve communiquer autorite controle</h6>
                                <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_risque_eleve').style.display = 'block'">\/</a>
                                <br>
                                <div id="r_risque_eleve" style="display: none">

                                    <input type="checkbox" id="r1_risque_eleve" value="" required>
                                    <label for="r1_risque_eleve">Pouvoir fournir le cas échéant, les responsabilités respectives du responsable du traitement, des responsables conjoints et des sous-traitants participant au traitement, en particulier pour le traitement au sein d'un groupe d'entreprises</label><br>

                                    <input type="checkbox" id="r2_risque_eleve" value="" required>
                                    <label for="r2_risque_eleve">Pouvoir fournir les finalités et les moyens du traitement envisagé</label><br>

                                    <input type="checkbox" id="r3_risque_eleve" value="" required>
                                    <label for="r3_risque_eleve">Pouvoir fournir les mesures et les garanties prévues afin de protéger les droits et libertés des personnes concernées en vertu du présent règlement</label><br>

                                    <input type="checkbox" id="r4_risque_eleve" value="" required>
                                    <label for="r4_risque_eleve">Pouvoir fournir le cas échéant, les coordonnées du délégué à la protection des données</label><br>

                                    <input type="checkbox" id="r5_risque_eleve" value="" required>
                                    <label for="r5_risque_eleve">Pouvoir fournir l'analyse d'impact relative à la protection des données prévue à l'article 35</label><br>

                                    <input type="checkbox" id="r6_risque_eleve" value="" required>
                                    <label for="r6_risque_eleve">Pouvoir fournir toute autre information que l'autorité de contrôle demande.</label><br>
                                </div>

                                <h6>Analyse doit contenir au moins</h6>
                                <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_analyse').style.display = 'block'">\/</a>
                                <br>
                                <div id="r_analyse" style="display: none">

                                    <input type="radio" id="r1_analyse" value="" >
                                    <label for="r1_analyse">Une description systématique des opérations de traitement envisagées et des finalités du traitement, y compris, le cas échéant, l'intérêt légitime poursuivi par le responsable du traitement</label><br>

                                    <input type="radio" id="r2_analyse" value="">
                                    <label for="r2_analyse">Une évaluation de la nécessité et de la proportionnalité des opérations de traitement au regard des finalités</label><br>

                                    <input type="radio" id="r3_analyse" value="">
                                    <label for="r3_analyse">Une évaluation des risques pour les droits et libertés des personnes concernées conformément au paragraphe 1</label><br>

                                    <input type="radio" id="r4_analyse" value="">
                                    <label for="r4_analyse">Les mesures envisagées pour faire face aux risques, y compris les garanties, mesures et mécanismes de sécurité visant à assurer la protection des données à caractère personnel et à apporter la preuve du respect du présent règlement, compte tenu des droits et des intérêts légitimes des personnes concernées et des autres personnes affectées.</label><br>
                                </div>
                            </div>
                                </div>
                        </div>


                    <h5>Election delegue protection donnee</h5>
                    <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_election_delegue').style.display = 'block'">\/</a>
                    <br>
                    <div id="r_election_delegue" style="display: none">
                        <input type="checkbox" id="r1_election_delegue" value="" required>
                        <label for="r1_election_delegue">le traitement est effectué par une autorité publique ou un organisme public, à l'exception des juridictions agissant dans l'exercice de leur fonction juridictionnelle</label><br>

                        <input type="checkbox" id="r2_election_delegue" value="" required>
                        <label for="r2_election_delegue">les activités de base du responsable du traitement ou du sous-traitant consistent en des opérations de traitement qui, du fait de leur nature, de leur portée et/ou de leurs finalités, exigent un suivi régulier et systématique à grande échelle des personnes concernées</label><br>

                        <input type="checkbox" id="r3_election_delegue" value="" required>
                        <label for="r3_election_delegue">les activités de base du responsable du traitement ou du sous-traitant consistent en un traitement à grande échelle de catégories particulières de données visées à l’article 9 ou de données à caractère personnel relatives à des condamnations pénales et à des infractions visées à l’article 10</label><br>

                    </div>

                    <h5>Si delegue elu</h5>
                    <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_delegue_elu').style.display = 'block'">\/</a>
                    <br>
                    <div id="r_delegue_elu" style="display: none">
                        <input type="checkbox" id="r1_delegue_elu" value=""> required
                        <label for="r1_delegue_elu">publier les coordonnées du délégué à la protection des données et les communiquent à l'autorité de contrôle</label><br>

                        <input type="checkbox" id="r2_delegue_elu" value="" required>
                        <label for="r2_delegue_elu">le délégué à la protection des données soit associé, d'une manière appropriée et en temps utile, à toutes les questions relatives à la protection des données à caractère personnel</label><br>

                        <input type="checkbox" id="r3_delegue_elu" value="" required>
                        <label for="r3_delegue_elu">la protection des données est soumis au secret professionnel ou à une obligation de confidentialité en ce qui concerne l'exercice de ses missions, conformément au droit de l'Union ou au droit des États membres</label><br>

                        <input type="checkbox" id="r4_delegue_elu" value="" required>
                        <label for="r4_delegue_elu">les missions et tâches du delegue a la protection des données n'entraînent pas de conflit d'intérêts</label><br>

                    </div>

                        <h5>Code de conduite</h5>
                    <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_code_conduite').style.display = 'block'">\/</a>
                    <br>
                    <div id="r_code_conduite" style="display: none">
                        <input type="checkbox" id="r1_code_conduite" value="" required>
                        <label for="r1_code_conduite">le traitement loyal et transparent</label><br>

                        <input type="checkbox" id="r2_code_conduite" value="" required>
                        <label for="r2_code_conduite">les intérêts légitimes poursuivis par les responsables du traitement dans des contextes spécifiques</label><br>

                        <input type="checkbox" id="r3_code_conduite" value="" required>
                        <label for="r3_code_conduite">la collecte des données à caractère personnel</label><br>

                        <input type="checkbox" id="r4_code_conduite" value="" required>
                        <label for="r4_code_conduite">la pseudonymisation des données à caractère personnel</label><br>

                        <input type="checkbox" id="r5_code_conduite" value="" required>
                        <label for="r5_code_conduite">les informations communiquées au public et aux personnes concernées</label><br>

                        <input type="checkbox" id="r6_code_conduite" value="" required>
                        <label for="r6_code_conduite">l'exercice des droits des personnes concernées</label><br>

                        <input type="checkbox" id="r7_code_conduite" value="" required>
                        <label for="r7_code_conduite">les informations communiquées aux enfants et la protection dont bénéficient les enfants et la manière d'obtenir le consentement des titulaires de la responsabilité parentale à l'égard de l'enfant</label><br>

                        <input type="checkbox" id="r8_code_conduite" value="" required>
                        <label for="r8_code_conduite">les mesures et les procédures visées aux articles 24 et 25 et les mesures visant à assurer la sécurité du traitement visées à l'article 32</label><br>

                        <input type="checkbox" id="r9_code_conduite" value="" required>
                        <label for="r9_code_conduite">la notification aux autorités de contrôle des violations de données à caractère personnel et la communication de ces violations aux personnes concernées</label><br>

                        <input type="checkbox" id="r10_code_conduite" value="" required>
                        <label for="r10_code_conduite">le transfert de données à caractère personnel vers des pays tiers ou à des organisations internationales</label><br>

                        <input type="checkbox" id="r11_code_conduite" value="" required>
                        <label for="r11_code_conduite">les procédures extrajudiciaires et autres procédures de règlement des litiges permettant de résoudre les litiges entre les responsables du traitement et les personnes concernées en ce qui concerne le traitement, sans préjudice des droits des personnes concernées au titre des articles 77 et 79</label><br>

                        <input type="checkbox" id="r12_code_conduite" value="" required>
                        <label for="r12_code_conduite">s'engager à l'appliquer, sans préjudice des missions et des pouvoirs de l'autorité de contrôle qui est compétente en vertu de l'article 55 ou 56</label><br>

                    </div>




                    <h5>certifaction</h5>
                    <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_certifaction').style.display = 'block';document.getElementById('certifaction_cacher').style.display = 'block'">\/</a>
                    <br>
                    <div id="certifaction_cacher" style="display: none">
                        <div id="r_certifaction" style="display: none">
                            <input type="checkbox" id="r1_certifaction" value="" required>
                            <label for="r1_certifaction">La certification est volontaire et accessible via un processus transparent.</label><br>

                            <input type="checkbox" id="r2_certifaction" value="" required>
                            <label for="r2_certifaction">fournir à l'organisme de certification visé à l'article 43 ou, le cas échéant, à l'autorité de contrôle compétente toutes les informations ainsi que l'accès à ses activités de traitement, qui sont nécessaires pour mener la procédure de certification</label><br>

                            <h6>Validité</h6>
                            <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_validite').style.display = 'block'">\/</a>
                            <br>
                            <div id="r_validite" style="display: none">
                                <input type="checkbox" id="r1_validite" value="" required>
                                <label for="r1_validite">Si, consentement accessible, comprehensible et formuler de avec terme clair et simple (article 7)</label><br>

                                <input type="checkbox" id="r2_validite" value="" required>
                                <label for="r2_validite">Possibiliteé de retirer le consentement (article 7)</label><br>

                                <input type="checkbox" id="r3_validite" value="" required>
                                <label for="r3_validite">Accord d'un responsable legal et un moyen de verifier que ca soit bien le responsable legal pour les mineurs de moins de 15 ans</label><br>

                                <input type="checkbox" id="r4_validite" value="" required>
                                <label for="r4_validite">Accord d'un responsable legal et un moyen de verifier que ca soit bien le responsable legal pour les mineurs de moins de 15 ans</label><br>

                                <input type="checkbox" id="r5_validite" value="" required>
                                <label for="r5_validite">Accord d'un responsable legal et un moyen de verifier que ca soit bien le responsable legal pour les mineurs de moins de 15 ans</label><br>

                            </div>

                        </div>


                    </div>

                    <h5>transfert de donnee internationale</h5>
                    <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_transfert_donnees').style.display = 'block';document.getElementById('transfert_de_donnee_internationale').style.display = 'block'">\/</a>
                    <br>
                    <div id="transfert_de_donnee_internationale" style="display: none">
                        <div id="r_transfert_donnees" style="display: none">
                            <input type="checkbox" id="r1_transfert_donnees" value="" required>
                            <label for="r1_transfert_donnees">le pays iters  un territoire ou un ou plusieurs secteurs déterminés dans ce pays tiers, ou l'organisation internationale en question assure un niveau de protection adéquat</label><br>

                            <input type="checkbox" id="r2_transfert_donnees" value="" required>
                            <label for="r2_transfert_donnees">prevoir des clauses contractuelles entre le responsable du traitement ou le sous-traitant et le responsable du traitement, le sous-traitant ou le destinataire des données à caractère personnel dans le pays tiers ou l'organisation internationale</label><br>

                            <input type="checkbox" id="r3_transfert_donnees" value="" required>
                            <label for="r3_transfert_donnees">prevoir des dispositions à intégrer dans des arrangements administratifs entre les autorités publiques ou les organismes publics qui prévoient des droits opposables et effectifs pour les personnes concernées</label><br>
                        </div>

                        <h6>garanties appropriées</h6>
                        <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_garanties_appropriees').style.display = 'block'">\/</a>
                        <br>
                        <div id="r_garanties_appropriees" style="display: none">
                            <input type="checkbox" id="r1_garanties_appropriees" value="" required>
                            <label for="r1_garanties_appropriees">fournir un instrument juridiquement contraignant et exécutoire entre les autorités ou organismes publics</label><br>

                            <input type="checkbox" id="r2_garanties_appropriees" value="" required>
                            <label for="r2_garanties_appropriees">fournir des règles d'entreprise contraignantes conformément à l'article 47</label><br>

                            <input type="checkbox" id="r3_garanties_appropriees" value="" required>
                            <label for="r3_garanties_appropriees">fournir des clauses types de protection des données adoptées par la Commission en conformité avec la procédure d'examen visée à l'article 93, paragraphe 2</label><br>

                            <input type="checkbox" id="r4_garanties_appropriees" value="" required>
                            <label for="r4_garanties_appropriees">fournir des clauses types de protection des données adoptées par une autorité de contrôle et approuvées par la Commission en conformité avec la procédure d'examen visée à l'article 93, paragraphe 2</label><br>

                            <input type="checkbox" id="r5_garanties_appropriees" value="" required>
                            <label for="r5_garanties_appropriees">fournir un code de conduite approuvé conformément à l'article 40, assorti de l'engagement contraignant et exécutoire pris par le responsable du traitement ou le sous-traitant dans le pays tiers d'appliquer les garanties appropriées, y compris en ce qui concerne les droits des personnes concernées</label><br>

                            <input type="checkbox" id="r6_garanties_appropriees" value="" required>
                            <label for="r6_garanties_appropriees">fournir un mécanisme de certification approuvé conformément à l'article 42, assorti de l'engagement contraignant et exécutoire pris par le responsable du traitement ou le sous-traitant dans le pays tiers d'appliquer les garanties appropriées, y compris en ce qui concerne les droits des personnes concernées</label><br>

                        </div>

                        <h6>Condition transfert une des contions</h6>
                        <a href="#" style="text-decoration: none" onfocus="document.getElementById('r_condition_transfert').style.display = 'block'">\/</a>
                        <br>
                        <div id="r_condition_transfert" style="display: none">
                            <input type="radio" id="r1_condition_transfert" value="">
                            <label for="r1_condition_transfert">la personne concernée a donné son consentement explicite au transfert envisagé, après avoir été informée des risques que ce transfert pouvait comporter pour elle en raison de l'absence de décision d'adéquation et de garanties appropriées</label><br>

                            <input type="radio" id="r2_condition_transfert" value="">
                            <label for="r2_condition_transfert">le transfert est nécessaire à l'exécution d'un contrat entre la personne concernée et le responsable du traitement ou à la mise en œuvre de mesures précontractuelles prises à la demande de la personne concernée</label><br>

                            <input type="radio" id="r3_condition_transfert" value="">
                            <label for="r3_condition_transfert">le transfert est nécessaire à la conclusion ou à l'exécution d'un contrat conclu dans l'intérêt de la personne concernée entre le responsable du traitement et une autre personne physique ou morale</label><br>

                            <input type="radio" id="r4_condition_transfert" value="">
                            <label for="r4_condition_transfert">le transfert est nécessaire pour des motifs importants d'intérêt public</label><br>

                            <input type="radio" id="r5_condition_transfert" value="">
                            <label for="r5_condition_transfert">le transfert est nécessaire à la sauvegarde des intérêts vitaux de la personne concernée ou d'autres personnes, lorsque la personne concernée se trouve dans l'incapacité physique ou juridique de donner son consentement</label><br>

                            <input type="radio" id="r6_condition_transfert" value="">
                            <label for="r6_condition_transfert">le transfert est nécessaire à la constatation, à l'exercice ou à la défense de droits en justice</label><br>

                            <input type="radio" id="r7_condition_transfert" value="">
                            <label for="r7_condition_transfert">le transfert a lieu au départ d'un registre qui, conformément au droit de l'Union ou au droit d'un État membre, est destiné à fournir des 'informations au public et est ouvert à la consultation du public en général ou de toute personne justifiant d'un intérêt légitime, mais uniquement dans la mesure où les conditions prévues pour la consultation dans le droit de l'Union ou le droit de l'État membre sont remplies dans le cas d'espèce</label><br>

                        </div>
                    </div>


                    <br>
                    <input type="submit" id="test" value="Tester" >
                    <br>
                    <?php if(isset($_POST["test"])) {
                        ?>
                        <script>window.location.href="resultat.html"</script>
                    <?php
                    }?>
                </div>

            </div>

        </form>

        </div>

    </body>
</html>



