<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Session;

class BaseController extends Controller
{
    //function to check and generate unique slug
	public static function checkslug($slug,$mod,$item = null){
		$mod = 'App\\'.$mod;
		$slug = Str::slug($slug,'-');
		if(!empty($slug))
		{
			if(is_null($item)){
				//Checking a unique slug for new item
		        $check = $mod::whereSlug($slug)->count();
		        if($check !== 0)
		        {
		        	for($count=0; $mod::whereSlug($slug.$count)->count()!=0; $count++){
					}
		            $slug = $slug.$count;
		        }
		        return $slug;
			}
			else
			{
				if(Str::slug($item->name,'-') != $slug)
				{
					$check = $mod::where('id','!=',$item->id)->whereSlug($slug)->count();
					if($check !== 0)
					{
						for($count=0; $mod::whereSlug($slug.$count)->count()!=0; $count++){
						}
			            $slug = $slug.$count;
					}
				}
				else
					$slug = $item->slug;
				return $slug;
			}
		}
		elseif(!is_null($item))
		{
			if(!empty($item->slug))
				return $item->slug;
			return $this->uniqeAlpha(10,$mod,'slug');
		}
		else
			return $this->uniqeAlpha(10,$mod,'slug');
	}
	//function to check file name and generate unique filename
	public static function checkFile($name,$ext,$path){
		for($count=0; file_exists($path.$name.$count.'.'.$ext); $count++){
		}
		return $name.$count.'.'.$ext;
	}
	/**
	* Generate a "random" alpha-numeric string.
	*
	* Should not be considered sufficient for cryptography, etc.
	*
	* @param  int  $length
	* @return string
	*/
	public static function uniqeAlpha($length = 10,$mod,$field)
	{
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$mod = 'App\\'.$mod;
		do {
			$rand = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
		} while ( $mod::where($field,$rand)->count()!=0);
		return $rand;
	}

	public static function image_resize($src, $width, $height, $crop=0){
		$img_ratio = 0.7111;
		$required_height = $width/$img_ratio;
		if(!file_exists($src))
			return "";
		$info = pathinfo($src);
		$thumbd = str_replace($info['basename'], "", $src).'thumb/';
		if(!file_exists($thumbd))
			mkdir($thumbd, 0777, true);
	  	if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";

	  	$type = strtolower(substr(strrchr($src,"."),1));
	  	if($type == 'jpeg') $type = 'jpg';
	  	switch($type){
		    case 'bmp': $img = imagecreatefromwbmp($src); break;
		    case 'gif': $img = imagecreatefromgif($src); break;
		    case 'jpg': $img = imagecreatefromjpeg($src); break;
		    case 'png': $img = imagecreatefrompng($src); break;
		    default : return "Unsupported picture type!";
	  	}

	  	// resize
	  	if($crop){
			$thumb = str_replace($info['basename'], "", $src).'thumb/'.$width.'X'.$height.'crop_'.$info['basename'];
			if(file_exists($thumb))
				return str_replace(public_path(), url('/'), $thumb);
			else
				copy($src, $thumb);
		    if($w < $width or $h < $height) return "Picture is too small!";
		    $ratio = max($width/$w, $height/$h);
		    $h = $height / $ratio;
		    $x = ($w - $width / $ratio) / 2;
		    $w = $width / $ratio;
	  	}
	  	else{
	  		$thumb = str_replace($info['basename'], "", $src).'thumb/'.$width.'X'.$height.'resize_'.$info['basename'];
			if(file_exists($thumb))
				return str_replace(public_path(), url('/'), $thumb);			
			else
				copy($src, $thumb);
		    if($w < $width and $h < $height) return "Picture is too small!";
		    $ratio = min($width/$w, $height/$h);
		    $width = $w * $ratio;
		    $height = $h * $ratio;
		    $x = 0;
	  	}

		$dst = $thumb;
	  	$new = imagecreatetruecolor($width, $height);

	  	// preserve transparency
	  	if($type == "gif" or $type == "png"){
		    imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
		    imagealphablending($new, false);
		    imagesavealpha($new, true);
	  	}

	  	imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);

	  	switch($type){
		    case 'bmp': imagewbmp($new, $dst); break;
		    case 'gif': imagegif($new, $dst); break;
		    case 'jpg': imagejpeg($new, $dst); break;
		    case 'png': imagepng($new, $dst); break;
	  	}
	  	return str_replace(public_path(), url('/'), $thumb);
	}

	public static function delete_image($src){
		$info = pathinfo($src);
		//Find thumbnail images
		$files = glob($info['dirname'].'/thumb/*_'.$info['filename'].'*.'.$info['extension']);
		//delete thumbnails
		foreach($files as $f){
			unlink($f);
		}
		//delete Image
		unlink($src);
	}

	/**
	* Generate a "random" alpha-numeric string.
	*
	* Should not be considered sufficient for cryptography, etc.
	*
	* @param  int  $length
	* @return string
	*/
	public static function alpha($length = 10)
	{
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$rand = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
		return $rand;
	}
	
	//function to check inmage name and generate unique image name
	public static function imageName($name,$ext,$path){
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$rand = substr(str_shuffle(str_repeat($pool, 10)), 0, 10);
		for($count=0; file_exists($path.$name.'_'.$rand.'.'.$ext); $count++){
		}
		return $name.'_'.$rand.'.'.$ext;
	}

	//Delete a directory and its files recursively
	function delete_files($target) 
	{
	    if(is_dir($target)){
	        $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

	        foreach( $files as $file ){
	            $this->delete_files( $file );      
	        }

	        rmdir( $target );
	    } elseif(is_file($target)) {
	        unlink( $target );  
	    }
	}
	
}
