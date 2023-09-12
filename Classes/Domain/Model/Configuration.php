<?php

declare(strict_types=1);

namespace Pixelant\PxaSocialFeed\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Extbase\Domain\Model\BackendUserGroup;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Configuration
 */
class Configuration extends AbstractEntity
{
    /**
     * Default PID
     *
     * @var int
     */
    protected $pid = 0;

    /**
     * hidden
     *
     * @var bool
     */
    protected $hidden = false;

    /**
     * clear
     *
     * @var bool
     */
    protected $performCleanUp = true;

    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * image size
     *
     * @var string
     */
    protected $imageSize = 'normal_images';

    /**
     * @var string
     */
    protected $socialId = '';

    /**
     * @var string
     */
    protected $endPointEntry = '';

    /**
     * @var int
     */
    protected $maxItems = 0;

    /**
     * @var int
     */
    protected $storage = 0;

    /**
     * @var Token
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $token;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<BackendUserGroup>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $beGroup;

    /**
     * Initialize
     */
    public function __construct()
    {
        $this->beGroup = new ObjectStorage();
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * @param bool $hidden
     */
    public function setHidden(bool $hidden): void
    {
        $this->hidden = $hidden;
    }

    /**
     * @return ObjectStorage<BackendUserGroup>
     */
    public function getBeGroup(): ObjectStorage
    {
        return $this->beGroup;
    }

    /**
     * @param ObjectStorage<BackendUserGroup> $beGroup
     */
    public function setBeGroup(ObjectStorage $beGroup): void
    {
        $this->beGroup = $beGroup;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getImageSize(): string
    {
        return $this->imageSize;
    }

    /**
     * @return string
     */
    public function getSocialId(): string
    {
        return $this->socialId;
    }

    /**
     * @param string $socialId
     */
    public function setSocialId(string $socialId): void
    {
        $this->socialId = $socialId;
    }

    /**
     * @return string
     */
    public function getEndPointEntry(): string
    {
        return $this->endPointEntry;
    }

    /**
     * @param string $endPointEntry
     */
    public function setEndPointEntry(string $endPointEntry): void
    {
        $this->endPointEntry = $endPointEntry;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setImageSize(string $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    /**
     * @return int
     */
    public function getMaxItems(): int
    {
        return $this->maxItems;
    }

    /**
     * @param int $maxItems
     */
    public function setMaxItems(?int $maxItems): void
    {
        $this->maxItems = $maxItems ?? 0;
    }

    /**
     * @return int
     */
    public function getStorage(): int
    {
        return $this->storage;
    }

    /**
     * @param int $storage
     */
    public function setStorage(?int $storage): void
    {
        $this->storage = $storage ?? 0;
    }

    /**
     * @return Token
     */
    public function getToken(): ?Token
    {
        if ($this->token instanceof LazyLoadingProxy) {
            $this->token->_loadRealInstance();
        }
        return $this->token;
    }

    /**
     * @param Token $token
     */
    public function setToken(Token $token): void
    {
        $this->token = $token;
    }

    /**
     * Get title of storage
     *
     * @return string
     */
    public function getStorageTitle()
    {
        $raw = BackendUtility::getRecord(
            'pages',
            $this->storage,
            'title'
        );

        return is_array($raw) ? $raw['title'] : '';
    }

    /**
     * @param bool $performCleanUp
     */
    public function setPerformCleanUp(bool $performCleanUp): void
    {
        $this->performCleanUp = $performCleanUp;
    }

    /**
    * @return bool
    */
    public function getPerformCleanUp(): bool
    {
        return $this->performCleanUp;
    }
}
