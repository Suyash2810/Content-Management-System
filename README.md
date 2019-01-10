# Content Management System

## Introduction

A system which is used to manage web content by various admins that have authorized access to the data. The content 
is being stored in mysql database and being displayed in a presentation layer as per the requests. 

### Explanation

The Content Management System has two areas. One is the Public Area and the other is the Admin Area.

The Public Area has the following characteristics:

```
1. Navigation through different pages.
2. Only the page content will be displayed.
3. The content is read only that is no changes cannot be made.
```
The Admin Area further has the following areas.

--> First is the login page which requests for the Admin username and password. The password for each admin is being 
encrypted using Blowfish algorithm with the help of salting which provides an extra layer of security from unauthorized access into the system.

After the verification of the username and password the system will redirect the particular Admin to the admin area.

The Admin area has three options. They are:

```
1. To manage the content of the pages.
2. To manage the admins of the Content Management System.
3. To logout the admin.
```

The content can be managed in the following ways:

```
1. Navigate through all the data visible or invisible to the public.
2. Perform CRUD operations on the category sections of the web content.
3. Perform CRUD operations on the respective pages for the categories.
```
Similarly the CRUD operations can be performed for the management of the admins of Content Management System.

### Prerequisites

For running this project one will need any cross-platform web server solution stack package like Wamp or Xampp.
Click [here](https://www.apachefriends.org/download.html) to download Xampp and click [here](http://www.wampserver.com/en/) to download Wamp.


### Steps

I have already added the database files in this project. To set up the sql database, follow the steps:

```
1. When using wamp server, go to the directory where wamp has been installed.
2. There will be a folder www, put the whole CMS folder there.
3. The sql files are present in Includes/widget_corp, copy them except the php files.
4. Open the sql console and create a database.
5. In the wamp folder go to bin/mysql/mysql-version/data, one will see a folder with the database name, paste all the files there.
6. Great! Good to go.
```


## Running the program

Open the main index.php file url on the localhost server to see the public area.
Similary open login_admin.php to access the Admin Area of the Content Management System.

### NOTE:
          The other pages will not be accessible until you login with a valid username and password.
          One Admin data is : Username - Eliot Henry , password - hello

## Authors

* **Suyash Awasthi** - *Initial work* - [suyash2810](https://github.com/suyash2810)

## License

This project is licensed under the MIT License - see the [LICENSE.md](https://github.com/Suyash2810/CMS/blob/master/LICENSE) file for details.

