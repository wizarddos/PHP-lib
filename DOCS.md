oficial documentation of this library 


ENG:

## List of functions in account-script

### addarticle

addarticle is function used to adding article to your website.  
It neutralizes html tags in inserted values and sets a date for today. List of parameters:  

*   connect file name - here you have to insert name of connection file
*   article content - content of your article
*   table - name of table where you insert articles
*   title - title of article
*   author - author's name (or nickname)

You have to have one more colum in database for date of insert

#### syntax

`addarticle("connect file name","content of artricle", "table name", "article's title", "article's author")`

### changepass

changepass is function used to changing user's password.  
It hashes inserted passwords in default algorythim. to use it you have to know old password List of parameters:  

*   old pass - user's old password
*   new pass - user's new password
*   column with pass - column with passwords
*   table name - name of table where you insert paswords
*   connect file name - here you have to insert name of connection file

#### syntax

`changepass("old user's password", "new user's password", "column with password", "table name", "name of connection file")`

### login

login is function used to log into account  
It validates inserted data and checks if it is correct List of parameters:  

*   login - inserted login
*   pass - inserted password
*   connect file name - here you have to insert name of connection file
*   table name - name of table where you insert paswords
*   column with login - column with login
*   column with pass - column with passwords

#### syntax

`login("inserted login", "inserted pass", "connect file name", "name of table", "column with login", "column with pass")`

### send files

send files is function used to send files into some dir  
It validates image List of parameters:  

*   target dir - directory to upload files
*   name file to upload - name atributte in input field

#### syntax

`uploadimg("name of dir", "input's name atributte")`

### show article

show article is function used to show article  
If query is sucessful function sets session varible named article to returned row in data base List of parameters:  

*   connect file name - here you have to insert name of connection file
*   id column - colum in database where you have id
*   id article - id of article
*   table name - name of table where you have your articles
*   article column - column with article

#### syntax

`showArticle("connection file name", "column with id", "article's id", "name of table", "column inn database where article content is")`

### valid

This is a short funtion used to validate login, email and 2 inputs fom passwords  
returnes true if values are safe and ready to insert into database List of parameters:  

*   login -inserted login
*   pass - inserted password
*   pass2 - pasword from second input field
*   email - inserted email

#### syntax

`valid("login", "password", "second password", "email")`

## functions in SQL-Queries

### DELETE

This function is representing DELETE query. Used to delete records in database List of parameters:  

*   connect file name - name of connection file
*   table - name of table
*   where col - column in database. part of condition
*   where val - value in column inserted in argument before to identify which row query has to delete

#### syntax

`delete("name of connection file", "name of table", "column", "value to identify")`

### Insert

represents INSERT query List of parameters:  

*   connect file name - name of connection file
*   table - name of table
*   values - values to insert into table. format: 'value1','value2','value3'...

#### syntax

`insert("connection file name", "table name", "values to insert")`

### SELECT

This function is representing SELECT query. Used to SELECT records from database List of parameters:  

*   connect file name - name of connection file
*   table - name of table
*   column - column in database. part of condition
*   val of column - value in column inserted in argument before to identify from which row query has to select values

#### syntax

`select("name of connection file", "name of table", "column", "value to identify")`

### UPDATE

This function is representing UPDATE query. Used to update records in database List of parameters:  

*   connect file name - name of connection file
*   table - name of table
*   value to update - value of column after query
*   column to update - column where query will update values
*   where update - column to identify where insert values
*   where update val - value to identify where query has to insert values

#### syntax

`update("name of connection file", "name of table", "value of column after query", "column wich query hs to update", "column to identify in which row update values" , "value to identify in which row update values")`