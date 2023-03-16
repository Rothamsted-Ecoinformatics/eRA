# eRAmanga 
## database for the managment of requests and user downloads

manga holds the requests for DET usernames and will also handle the download of prepared datasets and so on. 

A few preliminary questions that will help the design: I know that the basic features is to handle the logged in user and their downloads, 
but must think about the future. 

Do we agree that: 
- if a user takes the time to fill in a full request form, then they can have access to the prepared datasets. 
- If a user has asked access to prepared datasets and is logged in, their username and basic information will be entered automatically in the forms 
for eRA dataset request. 
- it then might seem sensible that a user first has a confirmed email address and logged in before they fill in the data request. 


If a user is from Rothamsted: do I have access to their email address through the environment? (when in VPN) 
A user from Rothasmted could be automatically logged in the system. 

Will have to aggree to record activity

We need a way to avoid recording activity from users that do not want to have their information recorded. 

If a user does not agree to have their downloads monitored, do they forsake the right to have access to the prepared datasets? 

Tables: 
-newmarkers: USers: they have a email address
SQL to create it: 
CREATE TABLE `newmarkers` (
  `nm-id` int(11) NOT NULL AUTO_INCREMENT,     
  `position` varchar(100) NOT NULL COMMENT 'email address',
  `vericode` varchar(100) NOT NULL COMMENT 'automated verification code',
  `doorbell` varchar(100) DEFAULT NULL COMMENT 'internal password',
  `fname` varchar(100) DEFAULT NULL COMMENT 'First Name',
  `lname` varchar(100) DEFAULT NULL  COMMENT 'Last Name',
  `institution` varchar(100) DEFAULT NULL COMMENT 'Literal Institution',
  `information` text COMMENT 'Why registration',
  `allowEmails` tinyint(1) DEFAULT NULL COMMENT 'Accepts general emails',
  `country` varchar(100) DEFAULT NULL COMMENT 'Country',
  PRIMARY KEY (`nm-id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=ascii COMMENT='Table for people who have access to more than OA and base foruser requests'


Table for Handling downloads: Connect users to the datasets downloaded 

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(100) NOT NULL COMMENT 'email address',
  `IP` varchar(100) DEFAULT NULL,
  `DOI` varchar(100) NOT NULL COMMENT 'dataset downloaded, identified by its DOI',
  `dldate` date DEFAULT NULL COMMENT 'when downloaded',
  `result` varchar(100) DEFAULT NULL COMMENT 'blank is success. Comment is erro type',
  `fullname` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `information` text,
  `institution` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1609 DEFAULT CHARSET=ascii COMMENT='Table logging the downloads of Datasets';


When a user downloads a file: 
INSERT INTO eRAmanga.downloads
(`position`, IP, DOI, dldate, `result`, fullname, country, information, institution)
VALUES('', '', '', '', '', '', '', '', '');




