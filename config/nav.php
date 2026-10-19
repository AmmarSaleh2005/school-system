<?php
return [
    [
        'title' => 'Home',
        'icon'  => 'bi bi-house-door',
        'route' => 'dashboard.index'
    ],
    [
        'title' => 'Class rooms',
        'icon'  => 'bi bi-easel',
        'route' => 'dashboard.classrooms.index'
    ],
    [
        'title' => 'Teachers',
        'icon'  => 'bi bi-person-workspace',
        'route' => 'dashboard.teachers.index'
    ],
    [
        'title' => 'Students',
        'icon'  => 'bi bi-people',
        'route' => 'dashboard.students.index'
    ],
    [
        'title' => 'Two factor authenticatable',
        'icon'  => 'bi bi-lock',
        'route' => 'dashboard.admin.2fa'
    ],
];
