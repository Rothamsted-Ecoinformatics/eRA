# Type of Files

The system uses file inclusion a lot in order to allow reuse of files or modules in various places. 
Historically, I started by creating modules which had a _ in front of the file name: this are not to be used alone but need to be wrapped in another file. These _modules are for more complexe programing. 

For simple html page with limited php code, that can be included in various places, place them in the metadata folder: 
if the file can be used in a general way, like conversion factors or how to access data, place them in the default folder

If they belong to a specific station, or experiment place them in the relevant folder. 

Any html page or simple php page that is listed in the default/infofiles.json list can be included in multiples types of files. 
like : info, blog, or more. 

blog page: a way to eventually have a blog. We could make it fancy
info page: a page of information, documentation about some general stuff

multitab pages. 
station, site and expt are multitab and use a variety of ways to get their info. We try to rely on all the json files produces by db2json to feed these pages. 

Specific pages. Some pages like newUser, or newGold still use the model of page/_module but really could be just the one page. 

 

