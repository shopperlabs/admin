<?php

declare(strict_types=1);

return [
    'title' => 'Gérer les commandes des clients',
    'show_title' => 'Détail de la commande ~ :number',
    'content' => "Lorsque les clients passent des commandes, c'est là que s'effectuent tous les traitements, la gestion des remboursements et le suivi de leurs commandes.",
    'total_price_description' => 'Ce prix ne comprend pas les taxes applicables au produit ou au client.',

    'no_shipping_method' => "Cette commande n'a pas de méthode d'expédition",
    'read_about_shipping' => 'En savoir plus sur la livraison',
    'payment_actions' => 'Actions de paiement',
    'send_invoice' => 'Envoyer la facture',
    'private_notes' => 'Notes privées',
    'customer_date' => 'Client depuis :date',
    'customer_orders' => 'Ce client a déjà passé :number commande(s)',
    'customer_infos' => 'Informations du client',

    'modals' => [
        'archived_number' => 'Archivé la commande :number',
        'archived_notice' => 'Êtes-vous sûr de vouloir archiver cette commande ? Cette action modifiera le revenu que vous avez gagné jusqu\'à présent dans votre magasin.',
    ],

    'notifications' => [
        'archived' => 'La commande a été archivée avec succès !',
        'cancelled' => 'La commande a été annulée avec succès !',
        'note_added' => 'Votre note a été ajoutée à cette commande.',
        'registered' => 'La commande a été enregistrée avec succès !',
        'paid' => 'La commande est marquée comme payée !',
        'completed' => 'La commande est marquée comme complète !',
    ],

];
