<?php

declare(strict_types=1);

namespace App\Entity;

use App\Form\Type\AdminBookType;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Sylius\Component\Resource\Annotation\SyliusRoute;
use Sylius\Component\Resource\Model\ResourceInterface;

#[Entity]
#[SyliusRoute(
    name: 'app_book_show',
    path: '/books/{author}',
    methods: ['GET'],
    controller: 'app.controller.book::showAction',
    repository: [
        'method' => 'findOneNewestByAuthor',
        'arguments' => ['$author'],
    ],
    criteria: [
        'enabled' => true,
    ],
    serializationGroups: ['Custom', 'Details'],
    serializationVersion: '1.0.2',
)]
class Book implements ResourceInterface
{
    #[Column(type: 'integer')]
    #[Id]
    #[GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[Column(type: 'string')]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
