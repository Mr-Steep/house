<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('imageUpload');
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        $habitation = $user->getFirstUnregisteredHabitation();
        $files = $request->file('files');
        foreach ($files as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $habitationId = $habitation->id;
            $folder = "storage/$userId/$habitationId";
            $path = public_path($folder);
            $this->makeDirPath($path);
            $image->move($path, $imageName);
            $fullPath = "$folder/$imageName";
            $this->compress_image($fullPath, $fullPath);
            Image::create([
                'habitation_id' => $habitationId,
                'path' => $fullPath
            ]);
        }

        echo json_encode(['upload' => true]);
        if (!empty($request->id)) {
            $removeImage = Image::find($request->id);
            $this->destroy($removeImage);
        }

    }

    function compress_image($tempPath, $originalPath, $imageQuality = 50)
    {

        // Get image info
        $imgInfo = getimagesize($tempPath);
        $mime = $imgInfo['mime'];

        // Create a new image from file
//        $image = match ($mime) {
//            'image/png' => imagecreatefrompng($tempPath),
//            'image/gif' => imagecreatefromgif($tempPath),
//            default => imagecreatefromjpeg($tempPath),
//        };
//        imageflip($image, IMG_FLIP_VERTICAL);

        switch ($mime) {
            case 'image/png':
                $image = imagecreatefrompng($tempPath);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($tempPath);
                break;
            default:
            case 'image/jpeg':
                $image = imagecreatefromjpeg($tempPath);
                $exif = exif_read_data($tempPath);
                if ($image && $exif && isset($exif['Orientation'])) {
                    $ort = $exif['Orientation'];

                    if ($ort == 6 || $ort == 5) {
                        $image = imagerotate($image, 270, 0);
                    }
                    if ($ort == 3 || $ort == 4) {
                        $image = imagerotate($image, 180, 0);
                    }
                    if ($ort == 8 || $ort == 7) {
                        $image = imagerotate($image, 90, 0);
                    }
                    if ($ort == 5 || $ort == 4 || $ort == 7) {
                        imageflip($image, IMG_FLIP_HORIZONTAL);
                    }
                }
                break;
        }
        // Save image
        imagejpeg($image, $tempPath, 60);
        // Return compressed image
        return $originalPath;
    }

    public function destroy(Image $image)
    {
        $image->delete();
        unlink(base_path('/public/'.$image->path));
        return json_encode(['delete' => true]);
    }


    function makeDirPath($path)
    {
        return file_exists($path) || mkdir($path, 0777, true);
    }
}
