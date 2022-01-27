<?php

namespace Mk\Feed\Generators\GoogleReview;

use Mk, Nette;
use Mk\Feed\Generators\BaseItem;

/**
 * Class Item

 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Google
 */
class Item extends BaseItem {

    private string $id;

    private ?string $reviewerId;

    private string $userName;

    private ?\DateTime $reviewTimestamp;

    private ?string $reviewTitle;

    private string $reviewContent;

    /** @var string[]  */
    private array $pros;

    /** @var string[]  */
    private array $cons;

    private string $reviewUrl;

    private float $rating;

    private string $sku;

    private ?string $brand;

    private string $productName;

    private string $productUrl;

    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Item
     */
    public function setId(string $id): Item {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReviewerId(): ?string {
        return $this->reviewerId;
    }

    /**
     * @param string|null $reviewerId
     * @return Item
     */
    public function setReviewerId(?string $reviewerId): Item {
        $this->reviewerId = $reviewerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return Item
     */
    public function setUserName(string $userName): Item {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getReviewTimestamp(): ?string {
        return $this->reviewTimestamp ? $this->reviewTimestamp->format(\DateTime::ATOM) : null;
    }

    /**
     * @param \DateTime|null $reviewTimestamp
     * @return Item
     */
    public function setReviewTimestamp(?\DateTime $reviewTimestamp): Item {
        $this->reviewTimestamp = $reviewTimestamp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReviewTitle(): ?string {
        return $this->reviewTitle;
    }

    /**
     * @param string|null $reviewTitle
     * @return Item
     */
    public function setReviewTitle(?string $reviewTitle): Item {
        $this->reviewTitle = $reviewTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getReviewContent(): string {
        return $this->reviewContent;
    }

    /**
     * @param string $reviewContent
     * @return Item
     */
    public function setReviewContent(string $reviewContent): Item {
        $this->reviewContent = $reviewContent;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getPros(): array {
        return $this->pros;
    }

    /**
     * @param string[] $pros
     * @return Item
     */
    public function setPros(array $pros): Item {
        $this->pros = $pros;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getCons(): array {
        return $this->cons;
    }

    /**
     * @param string[] $cons
     * @return Item
     */
    public function setCons(array $cons): Item {
        $this->cons = $cons;
        return $this;
    }

    /**
     * @return string
     */
    public function getReviewUrl(): string {
        return $this->reviewUrl;
    }

    /**
     * @param string $reviewUrl
     * @return Item
     */
    public function setReviewUrl(string $reviewUrl): Item {
        $this->reviewUrl = $reviewUrl;
        return $this;
    }

    /**
     * @return float
     */
    public function getRating(): float {
        return $this->rating;
    }

    /**
     * @param float $rating
     * @return Item
     */
    public function setRating(float $rating): Item {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return string
     */
    public function getSku(): string {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return Item
     */
    public function setSku(string $sku): Item {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrand(): ?string {
        return $this->brand;
    }

    /**
     * @param string|null $brand
     * @return Item
     */
    public function setBrand(?string $brand): Item {
        $this->brand = $brand;
        return $this;
    }



    /**
     * @return string
     */
    public function getProductName(): string {
        return $this->productName;
    }

    /**
     * @param string $productName
     * @return Item
     */
    public function setProductName(string $productName): Item {
        $this->productName = $productName;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductUrl(): string {
        return $this->productUrl;
    }

    /**
     * @param string $productUrl
     * @return Item
     */
    public function setProductUrl(string $productUrl): Item {
        $this->productUrl = $productUrl;
        return $this;
    }


    public function addCon($con) {
        $this->cons[] = $con;
    }

    public function addPro($con) {
        $this->pros[] = $pro;
    }
}
