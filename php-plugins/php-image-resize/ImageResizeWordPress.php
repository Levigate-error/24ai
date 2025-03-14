<?php

include_once __DIR__.'/ImageResize.php';
/**
 * PHP class to resize and scale images
 */
class ImageResizeWordPress
{
    public static function resizeWidthWebp($file_src, $width)
    {
        echo '<!--';
        echo '<pre>';

        $image_url = parse_url($file_src);
        var_dump($image_url);
        
        if(!empty($image_url["path"]) && file_exists($_SERVER['DOCUMENT_ROOT'].$image_url["path"])){

            $type = mime_content_type($_SERVER['DOCUMENT_ROOT'].$image_url["path"]);

            if($type === 'image/png' || $type === 'image/jpeg') {

                $image_resize_w = $width;
                $image_resize_h = 0;

                $image_resize_url = str_replace('/wp-content/uploads', '/wp-content/uploads/cach/' . $image_resize_w . '_' . $image_resize_h, $image_url["path"]);

                $image_resize_root_dir = explode('/', $image_resize_url);
                array_pop($image_resize_root_dir);
                $image_resize_root_dir = $_SERVER['DOCUMENT_ROOT'] . implode('/', $image_resize_root_dir);


                if (!is_dir($image_resize_root_dir)) {
                    mkdir($image_resize_root_dir, 0755, true);
                    var_dump(' -- creat dir  -- ');
                }

                if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $image_resize_url)) {
                    $image = new ImageResize($_SERVER['DOCUMENT_ROOT'] . $image_url["path"]);
                    $image->resizeToWidth($image_resize_w);
                    $image->save($_SERVER['DOCUMENT_ROOT'] . $image_resize_url);
                    var_dump(' -- creat file  -- ');
                }

                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $image_resize_url)) {
                    $image_resize_url = ImageResize::getWebp($image_resize_url);
                    var_dump(' -- creat file webp  -- ');
                }

                if (!empty($image_url["scheme"]) && !empty($image_url["host"])) {
                    $image_resize_url = $image_url["scheme"] . '://' . $image_url["host"] . $image_resize_url;
                }

                $file_src = $image_resize_url;

            }
        }

        echo '</pre>';
        echo '-->';

        return $file_src;
    }

}
