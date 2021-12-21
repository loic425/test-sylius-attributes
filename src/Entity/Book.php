<?php

declare(strict_types=1);

namespace App\Entity;

use Sylius\Component\Resource\Annotation\SyliusCrudRoutes;
use Sylius\Component\Resource\Annotation\SyliusRoute;
use Sylius\Component\Resource\Model\ResourceInterface;

#[SyliusCrudRoutes(
    alias: 'app.book',
    path: 'library',
    section: 'backend',
    redirect: 'index',
    grid: 'sylius_backend_admin_user',
    except: ['show'],
    vars: [
        'all' => [
            'subheader' => 'sylius.ui.manage_users_able_to_access_administration_panel',
        ],
        'index' => [
            'icon' => 'lock',
        ]
    ],
)]

#[SyliusRoute(
    name: 'app_backend_book_show',
    path: '/library/{id}',
    methods: ['GET'],
    controller: 'app.controller.book::indexAction',
    template: 'backend/book/show.html.twig',
    vars: [
        'subheader' => 'sylius.ui.manage_users_able_to_access_administration_panel',
    ]
)]
class Book implements ResourceInterface
{
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
