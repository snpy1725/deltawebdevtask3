Overview:
This is a web service to add code snippets to an online platform, to which others have access to. To add and delete snippets, one must register and login. Without logging in, one can simply view the existing list of code snippets already existing in the database.

Database information and Tables used:
in the php files used to make this web service, a database in mysql is used - 'codebin'. This database contains 2 tables which are used by the files - 1)people: This contains info of the users registered with the web service. It has the following fields:
a)FirstName - Varchar(100)
b)LastName - varchar(100)
c)Username - varchar(100)
d)Password - varchar(100)  {This stores the md5 hash of the actual password}

2)codesnippets : This table contains the snippet and its details. Its fields are:

a)Title - Varchar(200) {Primary key}
b)Code - text
c)CodingLanguage - Varchar(25)
d)Username - Varchar(100) {taken for security purposes}

Build Instructions:
1)This task was done on the WAMP server. Download and install it. Create the necessary tables and database.
2)open the link - (assuming that server name is kept 'localhost'): localhost/codelist.php
on opening the page, you will be a guest user and cannot add snippets but view those already existing. Follow the hyperlinks provided to login and add code snippets of your choice.
