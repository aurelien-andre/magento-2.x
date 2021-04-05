<?php

namespace BureauVallee\Shop\Api\Data;

/**
 * Interface ShopInterface
 * @package BureauVallee\Shop\Api\Data
 */
interface ShopInterface
{
    /** @var string */
    const CODE = 'code';

    /** @var string */
    const NAME = 'name';

    /** @var string */
    const IMAGE = 'image';

    /** @var string */
    const IS_ENABLED = 'is_enabled';

    /**
     * @return int|null
     */
    public function getStoreId(): ?int;

    /**
     * @param int $storeId
     */
    public function setStoreId(int $storeId): void;

    /**
     * @return string|null
     */
    public function getCode(): ?string;

    /**
     * @param string $code
     */
    public function setCode(string $code): void;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @return string|null
     */
    public function getImage(): ?string;

    /**
     * @param string $image
     */
    public function setImage(string $image): void;

    /**
     * @return GeolocationInterface|null
     */
    public function getGeolocation(): ?GeolocationInterface;

    /**
     * @param GeolocationInterface $geolocation
     */
    public function setGeolocation(GeolocationInterface $geolocation): void;

    /**
     * @return AddressInterface|null
     */
    public function getAddress(): ?AddressInterface;

    /**
     * @param AddressInterface $address
     */
    public function setAddress(AddressInterface $address): void;

    /**
     * @return ContactInterface[]
     */
    public function getContacts(): array;

    /**
     * @param ContactInterface[] $contacts
     */
    public function setContacts(array $contacts): void;

    /**
     * @return TimetableInterface[]
     */
    public function getTimetables(): array;

    /**
     * @param TimetableInterface[] $timetables
     */
    public function setTimetables(array $timetables): void;

    /**
     * @return DayOffInterface[]
     */
    public function getDayOffs(): array;

    /**
     * @param DayOffInterface[] $dayOffs
     */
    public function setDayOffs(array $dayOffs): void;

    /**
     * @return bool|null
     */
    public function getIsEnabled(): ?bool;

    /**
     * @param bool $isEnabled
     */
    public function setIsEnabled(bool $isEnabled = true): void;
}