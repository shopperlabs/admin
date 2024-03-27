<?php

declare(strict_types=1);

return [

    'empty_country_selector' => 'Veuillez sélectionner un pays',
    'logo_description' => 'Le logo de votre boutique qui sera visible sur votre site. Cet actif apparaîtra sur vos factures.',
    'about_description' => 'Vous pouvez rajouter ces informations sur une page "À propos" de votre site web.',
    'currency_description' => 'Il s\'agit de la devise dans laquelle vos produits sont vendus. Après votre première vente, la devise est verrouillée et ne peut être modifiée.',
    'mapbox_disabled' => 'Mapbox n\'a pas été activée.',

    'initialization' => [
        'title' => 'Configuration de la boutique',
        'step_one_title' => 'Information',
        'step_one_description' => 'Fournissez des informations utiles pour votre magasin.',
        'step_two_title' => 'Adresse',
        'step_two_description' => 'Indiquez l\'adresse du magasin.',
        'step_tree_title' => 'Liens sociaux',
        'step_tree_description' => 'Liens vers vos comptes de médias sociaux.',

        'step' => 'Étape :step sur 3',
        'shop_configuration' => 'Configuration de la boutique',
        'step_1' => 'Étape 1 - Informations sur le magasin',
        'tell_about' => 'Parlez-nous de votre boutique',
        'step_1_description' => 'Ces informations seront utiles si vous souhaitez que les utilisateurs de votre site vous contactent directement par e-mail ou par votre numéro de téléphone.',

        'step_2' => 'Étape 2 - Informations sur l\'adresse',
        'address_description' => 'Vous devez préciser l\'adresse et la localisation de votre magasin',
        'step_2_description' => 'Ne vous inquiétez pas. Vous pouvez modifier ces paramètres à tout moment. Shopper vous permet de commencer par le plus petit niveau afin que vous puissiez voir l\'évolution de votre boutique.',

        'step_3' => 'Étape 3 - Liens sociaux',
        'social_description' => 'Votre boutique sur les réseaux sociaux.',
        'step_3_description' => 'Vous pouvez ajouter des liens vers vos comptes de médias sociaux afin que votre boutique puisse être trouvée facilement sur vos pages de médias sociaux.',
        'action' => 'Configurer ma boutique',
    ],

    'settings' => [
        'title' => 'Réglage du magasin',
        'store_details' => 'Informations du magasin',
        'store_detail_summary' => 'Vos clients utiliseront ces informations pour vous contacter.',
        'email_helper' => 'Vos clients utiliseront cette adresse s\'ils ont besoin de vous contacter.',
        'phone_number_helper' => 'Vos clients utiliseront ce numéro de téléphone s\'ils ont besoin de vous appeler directement.',
        'assets' => 'Fichiers',
        'assets_summary' => "Le logo et l'image de couverture de votre magasin qui seront visibles sur votre site. Cet actif apparaîtra sur vos factures.",
        'store_address' => 'Adresse du magasin',
        'store_address_summary' => "Cette adresse apparaîtra sur vos factures. Vous pouvez modifier l'adresse utilisée.",
        'store_currency' => 'Monnaie du magasin',
        'store_currency_summary' => "Il s'agit de la devise dans laquelle vos produits sont vendus. Après votre première vente, la devise est bloquée et ne peut plus être modifiée.",
        'social_links' => 'Liens sociaux',
        'social_links_summary' => 'Informations sur vos différents comptes sur les réseaux sociaux. Les utilisateurs pourront vous contacter directement sur vos pages officielles.',
        'update_information' => 'Mettre à jour les informations',
    ],

    'payment' => [
        'title' => 'Moyens de paiement',
        'stripe_description' => 'Acceptez les paiements sur votre boutique en utilisant des fournisseurs tiers tels que Stripe.',
        'stripe_enabled' => 'Stripe est disponible pour votre magasin.',
        'stripe_disabled' => 'Stripe n\'est pas activé.',
        'stripe_provider' => 'Ce fournisseur vous permet d\'intégrer Stripe PHP dans votre boutique pour permettre à vos clients d\'effectuer des paiements.',
        'stripe_about' => 'En savoir plus sur Stripe Payment',
        'stripe_actions' => 'Activer le paiement Stripe',
        'stripe_environment' => 'Stripe dispose de deux environnements: Sandbox et Live. Veillez à utiliser le sandbox pour les tests avant de passer à l\'action.',
        'stripe_dashboard' => 'Les clés d\'API peuvent être récupérées à partir de',
        'create_payment' => 'Créer un moyen de paiement',
        'no_method' => 'Aucune méthode de paiement trouvée',
    ],

    'validations' => [
        'country' => 'Le pays est requis',
        'shop_name' => 'Le nom du magasin est obligatoire',
        'shop_email' => "L'e-mail du magasin est requis",
    ],

    'notifications' => [
        'inventory' => 'Inventaire enregistré avec succès!',
    ],

    'roles_permissions' => [
        'title' => 'Rôles des utilisateurs et gestion des accès',
        'header_title' => 'Administrateurs et rôles',
        'role_available' => 'Rôles d\'administrateur disponible',
        'role_available_summary' => "Un rôle donne accès à des menus et à des fonctions prédéfinis, de sorte qu'en fonction du rôle et des autorisations qui lui sont attribués, un administrateur peut avoir accès à ce dont il a besoin.",
        'new_role' => 'Ajouter un rôle',
        'admin_accounts' => 'Comptes administrateurs',
        'admin_accounts_summary' => "Il s'agit des membres qui sont déjà présents dans votre magasin avec les rôles qui leur sont associés. Vous pouvez attribuer de nouveaux rôles aux membres existants ici.",
        'add_admin' => 'Ajouter un administrateur',
        'users_role' => 'Utilisateurs et rôles',
        'login_information' => 'Informations de connexion',
        'login_information_summary' => "Ces informations seront utiles à l'administrateur pour se connecter à l'administration de Shopper.",
        'send_invite' => 'Envoyer l\'invitation',
        'send_invite_summary' => 'Envoyez une invitation à cet administrateur par courrier électronique avec ses informations de connexion.',
        'personal_information' => 'Information personnelle',
        'personal_information_summary' => 'Informations relatives au profil de l\'administrateur.',
        'role_information' => 'Informations sur le rôle',
        'role_information_summary' => 'Attribuez à cet administrateur des rôles qui limiteront les actions qu\'il peut effectuer.',
        'roles' => 'Rôles',
        'permissions' => 'Permissions',
        'choose_role' => 'Choisissez un rôle pour cet administrateur',
        'create_permission' => 'Créer une permission',
        'role_alert_msg' => "Vous êtes sur le point de mettre à jour le rôle d'administrateur, ce qui pourrait bloquer votre accès au tableau de bord.",
        'with_role_name' => 'avec le rôle :name',
        'permissions_in_role' => 'pour le rôle :name',
        'custom_permission' => 'Permission personnalisée',
        'delete_team_member' => 'Êtes-vous sûr de vouloir supprimer ce membre ?',
    ],

    'location' => [
        'description' => 'Gérez les endroits où vous stockez des marchandises, remplissez des commandes et vendez des produits.',
        'count' => 'Vous utilisez :count sur 4 inventaires disponible.',
        'add' => 'Ajout d\'un inventaire',
        'detail' => 'Détails',
        'detail_summary' => "Donnez à cet emplacement un nom court pour qu'il soit facile à identifier. Vous verrez ce nom dans des domaines tels que les produits.",
        'address' => 'Adresse de l\'inventaire',
        'address_summary' => 'Les informations complètes de votre inventaire. Veuillez mettre des informations valables qui peuvent être accessibles à vos clients.',
        'set_default' => 'Définir comme inventaire par défaut',
        'set_default_summary' => "L'inventaire de ce site est disponible à la vente en ligne et sera utilisé par défaut.",
        'is_default' => "Il s'agit de votre inventaire par défaut. Pour déterminer si vous remplissez les commandes en ligne à partir de ce stock, sélectionnez d'abord un autre stock par défaut.",
    ],

    'analytics' => [
        'google' => 'Google Analytics',
        'google_description' => 'Google Analytics vous permet de suivre les visiteurs de votre site et de générer des rapports qui vous aideront dans votre marketing.',
        'gtag' => 'Google Tag Manager',
        'gtag_description' => 'Google Tag Manager permet aux responsables marketing d\'ajouter facilement des balises (Analytics, remarketing, etc.).',
        'pixel' => 'Facebook Pixel',
        'pixel_description' => 'Facebook Pixel vous aide à créer des campagnes publicitaires pour trouver de nouveaux clients qui ressemblent le plus à vos acheteurs.',
        'no_json' => 'Aucun fichier json n\'a été ajouté',
    ],

    'legal' => [
        'title' => 'Politique juridique',
        'refund' => 'Politique de remboursement',
        'privacy' => 'Politique de confidentialité',
        'shipping' => 'Politique de livraison',
        'terms_of_use' => 'Conditions générales utilisation',
        'summary' => 'Définissez :policy à laquelle seront soumis tous les utilisateurs et consommateurs des produits de votre magasin.',
    ],
];
