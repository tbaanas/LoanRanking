<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Campaign
{
	private $name;
	private $description;
	private $links;
	private $banners;
	private $product_name;




	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name): void
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription($description): void
	{
		$this->description = $description;
	}

	/**
	 * @return mixed
	 */
	public function getLinks()
	{
		return $this->links;
	}

	/**
	 * @param mixed $links
	 */
	public function setLinks($links): void
	{
		$this->links = $links;
	}

	/**
	 * @return mixed
	 */
	public function getBanners()
	{
		return $this->banners;
	}

	/**
	 * @param mixed $banners
	 */
	public function setBanners($banners): void
	{
		$this->banners = $banners;
	}

	/**
	 * @return mixed
	 */
	public function getProductName()
	{
		return $this->product_name;
	}

	/**
	 * @param mixed $product_name
	 */
	public function setProductName($product_name): void
	{
		$this->product_name = $product_name;
	}






}
