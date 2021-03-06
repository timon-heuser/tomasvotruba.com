<?php

declare(strict_types=1);

namespace TomasVotruba\FrameworkStats\ValueObject;

use Nette\Utils\Strings;
use TomasVotruba\FrameworkStats\Contract\LastYearTrendAwareInterface;

final class PackageData implements LastYearTrendAwareInterface
{
    /**
     * @var string
     * @see https://regex101.com/r/PWqxoE/1
     */
    private const DASH_OR_SLASH_REGEX = '#(\/|-)#';

    private string $packageShortName;

    private string $packageKey;

    public function __construct(
        private string $packageName,
        private float $lastYearTrend,
        private int $last12Months,
        private int $previous12Months
    ) {
        $this->packageShortName = (string) Strings::after($packageName, '/');

        $this->packageKey = Strings::replace($packageName, self::DASH_OR_SLASH_REGEX, '_');
    }

    public function getPackageName(): string
    {
        return $this->packageName;
    }

    public function getLastYearTrend(): float
    {
        return $this->lastYearTrend;
    }

    public function getLast12Months(): int
    {
        return $this->last12Months;
    }

    public function getPrevious12Months(): int
    {
        return $this->previous12Months;
    }

    public function getPackageShortName(): string
    {
        return $this->packageShortName;
    }

    public function getPackageKey(): string
    {
        return $this->packageKey;
    }
}
