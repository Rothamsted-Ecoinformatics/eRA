# Images, image processing and image conventions

## Image location:
all the images are located in the `images` folder. 
We will find: 
	- `logos`: different official logos for the site 
	- `banners`: Wide and short images that can be used as banner. Ratio: 4/1 Max width needed is 1200
	- `metadata`: images related to the experiments and the farms. The structure in images/metadata is the same as in the metadata folder. So if you have a folder in metadata make sure he has a folder in images too. 
	- `golden`: a selection of nice pictures formatted as 1.618/1 (golden ration) 
	- `squares`: a selection of nice pictures formatted as squares
	- `icons`: selection of iconography for the site. 

## Sizing
It is nice to have the full size image to work on, and may be so that people can download it. However, the max size we need is 1200 width. For the web site, there is no need for bigger. 
Each image can be triplicated using scanhandler into the following sizes: 
	- `FullSize`: no modification of the size: just some cropping as you set an orientate the image
	- `Pages`: set to 300 
	- `Thumbs`: set to 150
At the root of the folder are the original images. 


## Naming metadata images
The images are organised by folders representing their experiment. In each experiment, the images are named as follow: 
Original image: 
`1914-broakbalk-field.jpg` : as you can see we can start with the year and a - separated lowercase name. If we do it that way, we may be able to make captions programmatically. 

We have the year and a short descriptive title. No other code needed for original image. When no width is given, this refers to the original image
If the image is in the metadata folder, it is useful to give an idea of the aspect ratio in the title. 
Example of Aspect ratio we can use: `8-5` (golden ratio) `4-3` or `3-4`, `4-1` (banner)

Make the image the correct aspect ratio and name it appropriately then run ScanHandler(c) to make the correct sizes. 
## Using images 
There is a good example of usage of the different sizes images in the _people.php page. 
The different sizes are loaded at different breakpoint so as to appear sharp at all resolutions. 

## Renaming Images
Development too zdevScanDir.php.
> Written with [StackEdit](https://stackedit.io/).
