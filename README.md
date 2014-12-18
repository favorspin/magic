# magic app

a [Sails](http://sailsjs.org) application

##Pupose
A Magic the Gathering online database and card library. User libraries are searchable and trades can be initiated from within the app.

##Dependencies
Node.js 1.4.28+  
Sails.js 0.10.5+  
MySQL

##Install
Set up your connections in config/connections.js.

When running Sails.js for the first time, choose option 2 (alter) or 3 (drop), to create the appropriate tables in your database. Each time after, or in production, choose option 1 (safe). This setting can also be set to a default in config/models.js.

To install the database of cards, download AllSets.json from mtgjson.com. Place in the top level directory and run uploadFile.php.

###Contributions
If you would like to contribute or have questions, please email <spencer.rodriguez@me.com>, or fork the repository and submit pull requests.