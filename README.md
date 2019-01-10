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


### Prerequisites


To make the project functioning make sure that Python 3 is installed in the system.
To download Python use the following link : https://www.python.org/downloads/

I will suggest to use Git Bash to run the python program. Any other command line will also be fine.


### Steps

To set the data in myContacts.txt follow the steps below:

```
1. Open myContacts.txt file 
2. There will be two columns present in a single row.
3. The first column is for the name oi the person to whom the mail is being sent.
4. The second column is for the email id of the person to whom the mail is being sent.
```

To set the login information to your own account through which the emails will be sent, follow the steps below:


```
1. At line 8 initialize the variable 'youraddress' with your gmail account for sending the mails.
2. At line 9 initialize the variable 'yourpassword' with the password of your account.  
```

## Running the program

To run the program go to the folder 'Mail' and type the command : py ./mail.py 

If the setup of python has been right then the program will run.

### Account Login Issue

It might happen that the script may not run because of account login process being blocked by Gmail.
For this, follow the steps below :

```
1. Login to your account.
2. Go to https://myaccount.google.com/intro/security
3. On the left side select apps with account access.
4. Scroll down and turn on the 'Allow less secure apps' option.
5. Done!
```




## Authors

* **Suyash Awasthi** - *Initial work* - [suyash2810](https://github.com/suyash2810)

## License

This project is licensed under the MIT License - see the [LICENSE.md](https://github.com/Suyash2810/Mail/blob/master/LICENSE) file for details

