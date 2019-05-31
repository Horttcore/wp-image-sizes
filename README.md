# WP Image Sizes

A helper class to register image sizes

## Description

Image sizes are register like the default function add_image_size, beside of that, the image size will be added to the dropdown selection.

## Installation

`$ composer require ralfhortt/wp-image-sizes`

## Documentation

```php
<?php
new ImageSize(string $identifier, string $label, int $width, int $height, bool $crop);
```

## Usage

```php
<?php
use RalfHortt\ImageSizes\ImageSize;

(new ImageSize('tiny', __('Tiny', 'TEXTDOMAIN'), 50, 50, true))->register();
```
