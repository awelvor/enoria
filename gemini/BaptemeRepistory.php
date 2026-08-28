<?php

namespace App\Repository;

class BaptemeRepository 
{
    public function membreFoyer(): array
    {
        return [
            [
                'id' => 850495,
                'pere' => ['id' => 1, 'nom' => 'BERTRAND', 'prenom' => 'Matthieu, Joseph, Jean-Benoît'],
                'mere' => ['id' => 2, 'nom' => 'BERTRAND', 'prenom' => 'Benedicte, Marie-Jeanne'],
                'membres' => $this->membres(),
                'adressePostale' => ['numeroRue' => '5', 'rue' => 'Rue des Concises', 'cp' => '89240', 'ville' => 'Villefargeau']
            ]
        ];
    }

    public function membres(): array
    {
        return [
            ['prenom' => 'Pierre-Louis', 'particuleNom' => '', 'nom' => 'BERTRAND', 'dateNaissance' => '', 'IsBapteme' => 'T']
        ];
    }

    public function parente2(): array
    {
        return [
            [
                'personne1' => [
                    'id' => 1700063,
                    'sexe' => 'M',
                    'prenom' => 'Matthieu,Joseph, Jean-Benoît',
                    'particuleNom' => '',
                    'nom' => 'BERTRAND',
                    'nomJeuneFille' => '',
                    'profilAffichage' => 'A',
                    'membreFoyer' => [
                        ['adressePostale' => ['numeroRue' => '5', 'rue' => 'Rue des Concises', 'cp' => '89240', 'ville' => 'Villefargeau']]
                    ]
                ],
                'type' => 'P'
            ],
            [
                'personne1' => [
                    'id' => 1700064,
                    'sexe' => 'F',
                    'prenom' => 'Bénédicte, Marie-Jeanne',
                    'particuleNom' => '',
                    'nom' => 'BERTRAND',
                    'nomJeuneFille' => 'TAKIS',
                    'profilAffichage' => 'A',
                    'membreFoyer' => [
                        ['adressePostale' => ['numeroRue' => '5', 'rue' => 'Rue des Concises', 'cp' => '89240', 'ville' => 'Villefargeau']]
                    ]
                ],
                'type' => 'M'
            ]
        ];
    }

    public function beneficiaire(): array
    {
        return [
            [
                'personne' => ['id' => 1700062],
                'dossierPersonnel' => [
                    'numActe' => 45,
                    'representantParrain' => '',
                    'representantMarraine' => '',
                    'temoin' => '',
                    'parrain' => 'Victor BERTRAND',
                    'adresseParrain' => '13, résidence du Ruy Garnier 49100 Angers',
                    'marraine' => 'Marie THOMAS',
                    'adresseMarraine' => '64, rue des prairies'
                ]
            ]
        ];
    }

    public function sacrements(): array
    {
        return [
            [
                'type' => 'bapteme',
                'datePrevue' => '2026-01-02',
                'lieuReservation' => [
                    'salle' => [
                        'adresse' => ['ville' => 'lannion'],
                        'lieu' => 'lannion',
                        'nom' => 'presbytere'
                    ]
                ],
                'entiteLiee' => ['nom' => 'lannion'],
                'dossierBeneficiaires' => $this->beneficiaire(),
                'dossier' => ['celebrantExterieur' => ''],
                'celebrant' => [
                    'nom' => 'MARZIN',
                    'prenom' => 'Guy',
                    'particuleNom' => '',
                    'ClasseDetails' => 'vicaire',
                ]
            ]
        ];
    }

    public function personnes(): array
    {
        // Mutualisation des données communes pour éviter la répétition
        $sacrements = $this->sacrements();
        $membreFoyer = $this->membreFoyer();
        $parente2 = $this->parente2();

        return [
            [
                'id' => 1700062,
                'prenom' => 'Martin, Jean, Médéric',
                'sexe' => 'M',
                'nom' => 'BERTRAND',
                'autresPrenoms' => '',
                'nomJeuneFille' => '',
                'particuleNom' => '',
                'nomDeNaissance' => '',
                'dateNaissance' => '',
                'lieuNaissance' => '',
                'sacrements' => $sacrements,
                'membreFoyer' => $membreFoyer,
                'parente2' => $parente2,
            ],
            [
                'id' => 1700063,
                'prenom' => 'Matthieu',
                'sexe' => 'M',
                'nom' => 'BERTRAND',
                'autresPrenoms' => '',
                'nomJeuneFille' => '',
                'particuleNom' => '',
                'nomDeNaissance' => '',
                'dateNaissance' => '',
                'lieuNaissance' => '',
                'sacrements' => $sacrements,
                'membreFoyer' => $membreFoyer,
                'parente2' => $parente2,
            ],
            [
                'id' => 1700064,
                'prenom' => 'Bénédicte',
                'sexe' => 'F',
                'nom' => 'BERTRAND',
                'autresPrenoms' => '',
                'nomJeuneFille' => '',
                'particuleNom' => '',
                'nomDeNaissance' => '',
                'dateNaissance' => '',
                'lieuNaissance' => '',
                'sacrements' => $sacrements,
                'membreFoyer' => $membreFoyer,
                'parente2' => $parente2,
            ],
        ];
    }
}
