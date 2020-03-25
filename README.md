# new eRA web site
The new web site is designed in PHP, with Bootstrap 4 for styling. 
It is mainly database driven. 

# Principles
The information on the web site can be related to
- General Information
	* contact
	* credits
	* ...
- The Sites
	* Rothamsted
	* Woburn
	* Broom's Barn
	* Saxmundham
	* North Wyke
- Met Data which is at the different stations
- The Experiments
	* Broadbalks
		+ Dataset1
		+ Dataset2
	* Park Grass
		+ Dataset1
		+ Dataset2
	* ...
The file structure should make it easy to find the information and to maintain. 
The information is held in json files which are read by the code to be displayed online. The json files are either stored in the site or made on the fly.

# Structure of the web folders
- **css**: the style files are created using sass in another area of development. 
	*  bootstrap.css has the generic bootstrap styles
	* style.css has some project specific files. 
	* style.css.map: something that is useful for bootstrap
- **images**: this folder has all the images for the site
	* **logos**: generic logos for companies
	* **icons**: iconography for the site, when the fonts can't be used
	* **people**: ID photos of the people who work with us. dim: 500X500 
	* **metadata**: contains the images for the experiments and datasets. Images in gif, png, jpgs. NO TIFFs. When an image is cloned to get another size or a different framing see naming conventions to name the images. 
- **includes**: contain the settings, headers, common pieces of code, functions... 
- **js**: javascript functions
- **metadata**: the actual metadata for the site, the pages with information. 
The folders in metadata are for sites, experiments and datasets. 
The norm is site>expt>dataset
However, some experiments are on multi sites, and some datasets are from multiple experiments. 


an LTE can have more than one dataset. 
So in the metadata folder we can organise things: 
- rothamsted is a site or farm folder
	* data-description.php has all the php arrays with description of the experiment : it contains copies as PHP arrays of the following json files: soon obsolete
		* dataOverview.json: json string that summarizes the site
		* datacite.json: json string that has information that was sent to datacite if available
		* site.json: information about the site itself : lists the fields available and the information about them
		* experiments.json: json string to list the experiments on that site
		* documents.json: json string to list the associated documents to the site
		* images.json: list of images with caption, description, and so on. Used in _image
- rbk1 is an experiment folder
	* data-description.php has all the php arrays with description of the experiment : it contains copies as PHP arrays of the following json files.
		* site.json: json string that describes the sites
		* summary.json: json string that summarizes the experiment
		* datacite.json: json string that has information that was sent to datacite
		* design.json: json string to describe the design of the experiment
		* datasets.json: json string to list the datasets
		* documents.json: json string to list the associated documents to the experiment
	* BKBEANNUTRI is a dataset folder that contains the following files: 
		* summary.json
		* datacite.json
		* DATASET-data-v1.csv: the dataset as a csv file
		* DATASET-data-v1.xls: the dataset as a xls file
		* DATASET-sup-v1.xls: supplementary information 
		* DATASET-sup-v1.markdown : supplementary infor
	* BKBEANS
	* BKDISEASES
	 * ...
- rpg5
	* PARKCOMP
	* PARKCOMPIC
	* ...
- met
	 * RMMRAIN5318

 #   Naming conventions
## Naming php files
File names preceded with _undescore are modules and are supposed to be included in pages that link the headers. 
So we have two kinds of php pages at the root of the site: 
- normal pages: like `papers.php`, `index.php`.... 
	-  `devPages.php`:  The pages preceeded with dev are not meant to stay in the site but only there during the development process. They display styles or are temporary pages. 
	-  `delPages.php`: these are marked for deletion. Deprecated. 
 - modules: they are unit pages that are included in a normal page to bring special functionality. They are preceeded with underscore: `_paper.php`, `_design_php` . 

## Naming metadata folders
### farm / site folders: 
foldername for farm or site is the common name for the site (`rothamsted`, `woburn`..) 
### experiment folders
Folder Name for an experiment is the experiment code, stripped of all / and dates. so broadbalk is `rbk1` 
### dataset folders: 
Folder Name for a dataset is the `DATASETNAME`: short, unique, all caps: imagine that it could go in the database eventually.

See remark above regarding the struture: 
farm>experiment>dataset: under that paradigm, it makes sense to place dataset folders in experiment folders. 
We have some cases when experiments are on multiple sites or we want to write descriptions related to more than one experiment: like the rotation experiments: rrn including rrn1 and rrn2. ? we need to discuss that. 


# Where are the data files
Put the data files, and file with supporting information in the 'dataset' folder, which is in the experiment folder. 
 
Filename for the landing page in the old interface,  is index.php 
Filename for the Datafile is `DATASET-data-v1.xls` or `DATASET-data-v1.csv` 
supporting information is: `DATASET-sup-v1.xls` 
any file that is relevant to the dataset only should reside in the `DATASET` folder. 
Any file that is relevant to more than one dataset in the same experiment can go in the `experimen`t folder and not a dataset folder. 
>If a file is for more than one experiment, may be it should be at the root of metadata. Such file would be relevant to the whole farm or organisation. We need to think about that case scenario. 


# What is the URL of the landing page for a dataset? 
if the file location and name for the dataset is for example 
metadata/met/RMMR5318/index.php then the URL will eventually be
[www.era.rothamsted.ac.uk/met/RMMR5318](www.era.rothamsted.ac.uk/met/RMMR5318)
and the DOI will be: [https://doi.org/10.23637/RMMRAIN5318 (https://doi.org/10.23637/RMMRAIN5318)

# How to link to a dataset landing page? 
In the main experiment page, there is a list of links to datasets available, add the new ones there with either the link being the DOI link or the URL link. 
In the new site, we buid an array with all the datasets. 
This URL should not change with the new version of eRA. 


> Written with [StackEdit](https://stackedit.io/).
