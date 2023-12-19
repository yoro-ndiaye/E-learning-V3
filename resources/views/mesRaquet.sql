-- inserer des Données___________________________

INSERT INTO domaines (nomDomaine, description, created_at, updated_at)
VALUES 
  ('Programmation Web', 'Explorez le monde du développement web, des bases du HTML/CSS aux frameworks modernes et aux technologies front-end et back-end.', NOW(), NOW()),
  ('Sciences de la Donnée', 'Plongez dans le domaine en plein essor de la science des données, où vous apprendrez à manipuler, analyser et visualiser des ensembles de données complexes pour obtenir des insights significatifs.', NOW(), NOW()),
  ('Marketing Numérique', 'Découvrez les stratégies de marketing numérique, des techniques de référencement avancées aux campagnes publicitaires en ligne, pour atteindre efficacement votre public cible.', NOW(), NOW()),
  ('Design Graphique', 'Développez votre créativité visuelle en explorant les principes du design graphique, des fondamentaux du design aux outils avancés de création graphique.', NOW(), NOW()),
  ('Langues Étrangères', 'Maîtrisez une nouvelle langue et explorez différentes cultures à travers des cours interactifs couvrant la grammaire, le vocabulaire et la pratique de la communication.', NOW(), NOW()),
  ('Développement Personnel', 'Parcourez des sujets tels que la gestion du temps, la productivité, le leadership et la résolution de problèmes pour renforcer vos compétences personnelles et professionnelles.', NOW(), NOW());

--___________________________________________________

-- Modules pour le domaine "Programmation Web"
INSERT INTO modules (domaine_id, nomModule, description, image, created_at, updated_at)
VALUES 
  (1, 'Introduction au HTML/CSS', 'Apprenez les bases du développement web avec HTML pour la structure et CSS pour le style.', 'url_image1.jpg', NOW(), NOW()),
  (1, 'Développement avec JavaScript', 'Explorez les fondamentaux de JavaScript pour rendre vos pages web interactives et dynamiques.', 'url_image2.jpg', NOW(), NOW());

-- Modules pour le domaine "Sciences de la Donnée"
INSERT INTO modules (domaine_id, nomModule, description, image, created_at, updated_at)
VALUES 
  (2, 'Introduction à l\'Analyse de Données', 'Découvrez les concepts de base de l\'analyse de données, les types de données et les premières étapes de prétraitement.', 'url_image3.jpg', NOW(), NOW()),
  (2, 'Manipulation de Données avec Pandas (Python)', 'Plongez dans l\'outil puissant de manipulation de données, Pandas, en utilisant le langage de programmation Python.', 'url_image4.jpg', NOW(), NOW());

-- Modules pour le domaine "Marketing Numérique"
INSERT INTO modules (domaine_id, nomModule, description, image, created_at, updated_at)
VALUES 
  (3, 'Fondamentaux du Marketing en Ligne', 'Explorez les principes de base du marketing en ligne, y compris les stratégies de contenu et la publicité numérique.', 'url_image5.jpg', NOW(), NOW()),
  (3, 'SEO avancé et Analyse de Données', 'Approfondissez vos compétences en référencement et utilisez l\'analyse de données pour optimiser les performances de votre site web.', 'url_image6.jpg', NOW(), NOW());

-- Modules pour le domaine "Design Graphique"
INSERT INTO modules (domaine_id, nomModule, description, image, created_at, updated_at)
VALUES 
  (4, 'Principes Fondamentaux du Design', 'Maîtrisez les principes de base du design graphique, y compris la typographie, la couleur et la mise en page.', 'url_image7.jpg', NOW(), NOW()),
  (4, 'Outils Avancés de Design avec Adobe Creative Suite', 'Apprenez à utiliser des outils professionnels tels que Photoshop, Illustrator et InDesign pour créer des designs de haute qualité.', 'url_image8.jpg', NOW(), NOW());

-- Modules pour le domaine "Langues Étrangères"
INSERT INTO modules (domaine_id, nomModule, description, image, created_at, updated_at)
VALUES 
  (5, 'Fondamentaux de la Langue Étrangère', 'Acquérez des compétences de base en grammaire, vocabulaire et conversation dans la langue étrangère choisie.', 'url_image9.jpg', NOW(), NOW()),
  (5, 'Communication Professionnelle', 'Améliorez vos compétences de communication dans des contextes professionnels spécifiques de la langue étrangère.', 'url_image10.jpg', NOW(), NOW());

-- Modules pour le domaine "Développement Personnel"
INSERT INTO modules (domaine_id, nomModule, description, image, created_at, updated_at)
VALUES 
  (6, 'Gestion du Temps et Productivité', 'Apprenez des stratégies efficaces pour gérer votre temps et augmenter votre productivité personnelle et professionnelle.', 'url_image11.jpg', NOW(), NOW()),
  (6, 'Leadership et Prise de Décision', 'Développez vos compétences en leadership et apprenez à prendre des décisions éclairées dans divers contextes.', 'url_image12.jpg', NOW(), NOW());

---_____________________________________________

-- Cours pour le module "Introduction au HTML/CSS"
INSERT INTO cours (module_id, nomCours, description, image, ressource, created_at, updated_at)
VALUES 
  (1, 'Introduction à HTML', 'Apprenez les bases de HTML pour structurer vos pages web.', 'url_image1.jpg', 'url_ressource1.pdf', NOW(), NOW()),
  (1, 'Introduction à CSS', 'Découvrez les fondamentaux de CSS pour styliser vos pages web.', 'url_image2.jpg', 'url_ressource2.pdf', NOW(), NOW());

-- Cours pour le module "Développement avec JavaScript"
INSERT INTO cours (module_id, nomCours, description, image, ressource, created_at, updated_at)
VALUES 
  (2, 'Fondamentaux de JavaScript', 'Explorez les principes de base de JavaScript pour rendre vos pages web dynamiques.', 'url_image3.jpg', 'url_ressource3.pdf', NOW(), NOW()),
  (2, 'Manipulation DOM avec JavaScript', 'Apprenez à manipuler le DOM avec JavaScript pour interagir avec vos pages web.', 'url_image4.jpg', 'url_ressource4.pdf', NOW(), NOW());

-- Cours pour le module "Introduction à l'Analyse de Données"
INSERT INTO cours (module_id, nomCours, description, image, ressource, created_at, updated_at)
VALUES 
  (3, 'Concepts de l\'Analyse de Données', 'Découvrez les concepts fondamentaux de l\'analyse de données.', 'url_image5.jpg', 'url_ressource5.pdf', NOW(), NOW()),
  (3, 'Types de Données', 'Explorez les différents types de données utilisés dans l\'analyse de données.', 'url_image6.jpg', 'url_ressource6.pdf', NOW(), NOW());

-- Cours pour le module "Manipulation de Données avec Pandas (Python)"
INSERT INTO cours (module_id, nomCours, description, image, ressource, created_at, updated_at)
VALUES 
  (4, 'Introduction à Pandas', 'Apprenez les bases de la manipulation de données avec Pandas en Python.', 'url_image7.jpg', 'url_ressource7.pdf', NOW(), NOW()),
  (4, 'Filtrage et Tri avec Pandas', 'Découvrez les techniques de filtrage et de tri des données avec Pandas.', 'url_image8.jpg', 'url_ressource8.pdf', NOW(), NOW());

-- Cours pour le module "Fondamentaux du Marketing en Ligne"
INSERT INTO cours (module_id, nomCours, description, image, ressource, created_at, updated_at)
VALUES 
  (5, 'Stratégies de Contenu', 'Explorez les stratégies de contenu pour le marketing en ligne.', 'url_image9.jpg', 'url_ressource9.pdf', NOW(), NOW()),
  (5, 'Publicité Numérique', 'Découvrez les principes de base de la publicité numérique.', 'url_image10.jpg', 'url_ressource10.pdf', NOW(), NOW());

-- Cours pour le module "SEO avancé et Analyse de Données"
INSERT INTO cours (module_id, nomCours, description, image, ressource, created_at, updated_at)
VALUES 
  (6, 'SEO Avancé', 'Approfondissez vos connaissances en référencement avancé.', 'url_image11.jpg', 'url_ressource11.pdf', NOW(), NOW()),
  (6, 'Analyse de Données Marketing', 'Utilisez l\'analyse de données pour optimiser vos campagnes marketing.', 'url_image12.jpg', 'url_ressource12.pdf', NOW(), NOW());
