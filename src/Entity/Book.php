<?php

declare(strict_types=1);

namespace App\Entity;

use App\Form\Type\AdminBookType;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Sylius\Component\Resource\Annotation\SyliusCrudRoutes;
use Sylius\Component\Resource\Model\ResourceInterface;

#[SyliusCrudRoutes(
    alias: 'app.book',
    form: AdminBookType::class,
)]
#[Entity]
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
