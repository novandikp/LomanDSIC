<?php


if (!function_exists('path_cloud')) {
    function path_cloud($path)
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }
}
if (!function_exists('upload_cloud')) {
    function upload_cloud($image, $filename, $folderpath)
    {
        $newFilename = str_replace(' ', '_', $filename);
        $public_id = date('Y-m-d_His') . '_' . $newFilename;
        $result = cloudinary()->upload($image, [
            "public_id" => path_cloud($public_id),
            "folder"    => $folderpath
        ])->getSecurePath();

        return $result;
    }
}
if (!function_exists('replace_cloud')) {
    function replace_cloud($path,  $image, $filename, $folderpath)
    {
        delete_cloud($path, $folderpath);
        return upload_cloud($image, $filename, $folderpath);
    }
}

if (!function_exists('delete_cloud')) {
    function delete_cloud($path, $folderpath)
    {
        $public_id = $folderpath . '/' . path_cloud($path);
        return cloudinary()->destroy($public_id);
    }
}
