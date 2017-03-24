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

    const PER_PAGE = 5;
