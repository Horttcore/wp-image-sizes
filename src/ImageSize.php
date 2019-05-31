<?php
/**
 * Image size component.
 *
 * This file handles custom image sizes
 *
 * @license   GPL-2.0+
 */

namespace RalfHortt\ImageSizes;

class ImageSize
{
    /**
     * Image size name.
     *
     * @var string
     */
    protected $name;

    /**
     * Image size label.
     *
     * @var string
     */
    protected $label;

    /**
     * Image size width.
     *
     * @var int
     */
    protected $width;

    /**
     * Image size height.
     *
     * @var int
     */
    protected $height;

    /**
     * Should the image be cropped?
     *
     * @var bool
     */
    protected $crop;

    /**
     * Class constructor.
     *
     * @param string $name   Size identifier
     * @param string $label  Size name
     * @param int    $width  Size width
     * @param int    $height Size height
     * @param bool   $crop   Should the image cropped to dimensions
     */
    public function __construct(string $name, string $label, int $width, int $height, bool $crop = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->width = $width;
        $this->height = $height;
        $this->crop = $crop;
    }

    /**
     * Register.
     *
     * @return void
     */
    public function register(): void
    {
        add_image_size($this->name, $this->width, $this->height, $this->crop);
        add_filter('image_size_names_choose', [$this, 'imageSelect']);
    }

    /**
     * Add custom image to image chooser.
     *
     * @param array $imageSizes Image sizes registered to chooser element
     *
     * @return array Image size
     */
    public function imageSelect(array $imageSizes): array
    {
        $imageSizes[$this->name] = "{$this->label} ({$this->width}×{$this->height} px)";

        return $imageSizes;
    }
}
