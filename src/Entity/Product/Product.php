<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product")
 */
class Product extends BaseProduct
{
    public const COLOR_RED = 'Red';

    public const COLOR_GREEN = 'Green';

    public const COLOR_BLUE = 'Blue';

    /** @ORM\Column(type="string", columnDefinition="ENUM('red', 'green', 'blue')", nullable=true) */
    protected ?string $color;

    protected function createTranslation(): ProductTranslationInterface
    {
        return new ProductTranslation();
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    public static function getAvailableColors(): array
    {
        return [
            self::COLOR_RED => 0,
            self::COLOR_GREEN => 1,
            self::COLOR_BLUE => 2,
        ];
    }
}
