# Tools for development
I sometimes process folders of files or images using some tools I have made. 
These can be reused if needed. 

## doxyGEN 
Generate documentation from source code. 
http://www.doxygen.nl/
Open P:\era2018-doxy (intranet-server/era/era2018-doxy) to run it

Use doxywizard from Start Menu
the files are saved in intranet-server/era/era2018-doxy  and there is a link on the web site to access it. 
doxygen also creates PDFs, RTF and so on. 

It is good practice to comment the files and update the documentation as needed.


## devScanDir
Scan all the directories recursively and builds DOS commands to rename files: 
replaces Spaces, underscores and special characters with dashes. 

The tool then builds a CSV files that has the file location and a caption based on the file name. That can be imported in access and used to re caption and create a table that can be jsoned. 

## Timeline Database
This is an access database that can be used to create the json files required for the timelines and the images. 

## ScanHandler
Tool in Java to reframe, reposition and create several version of the same image in different sizes. 

## Visual Studio and GULP
I use Visual Studio Code, with Gulp to work on the css and compile the SASS scss files. 
Navigate to that place, \\Codequest/html/devmonogram/bs4  in CMD, and type gulp. 
This will then 
    Display the web page style with a few pages in the web browser, 
    and each time the scss is saves, the css is recompiled and page redisplayed. 
    As this does not work with PHP include, continue development of PHP pages and PHP code on the intranet server. Only use the Visual studio to work on teh Style./ Only copy the CSS folder accross to the development PHP site then production site. 

> Written with [StackEdit](https://stackedit.io/).
