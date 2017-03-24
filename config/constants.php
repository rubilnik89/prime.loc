<?php

    const TRANSACTION_STATUS_SUCCESS = 1;
    const TRANSACTION_STATUS_FAIL = 2;

    const TRANSACTION_STATUSES = [
        TRANSACTION_STATUS_SUCCESS => 'Успешна',
        TRANSACTION_STATUS_FAIL  => 'Ошибка'
    ];

    const PERSONAL_ACCOUNT = 1;
    const INVESTOR_ACCOUNT = 2;

    const USER_ACCOUNTS = [
        PERSONAL_ACCOUNT => 'Лицевой',
        INVESTOR_ACCOUNT  => 'Инвесторский'
    ];

    const TRANSACTION_TYPE_TRANSFER = 1;
    const TRANSACTION_TYPES = [
        TRANSACTION_TYPE_TRANSFER => 'Трансфер'
];

    const TARIF_OPTIMAL = 1;
    const TARIF_PROFITABLE = 2;
    const TARIF_BEST = 3;
    const TARIF_VIP = 4;

    const TARIFS = [
        TARIF_OPTIMAL => "Оптимальный",
        TARIF_PROFITABLE => "Выгодный",
        TARIF_BEST => "Лучший",
        TARIF_VIP => "ВИП",
    ];


    const PER_PAGE = 5;
