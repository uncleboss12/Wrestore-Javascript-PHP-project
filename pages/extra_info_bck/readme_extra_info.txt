This text provides the basic outline for the files within this folder.

See: "login_ok.php" (L.137) to show or hide survey forms.

1. For each survey (set of questions) prepare 3 files. For example, for 
   land-use-land-cover survey we have: "insert_lulc_info.php", "form_lulc.html", and
   "done_lulc_test.php"

2. "insert_lulc_info.php"
   - At the header, it asks for a SESSION. If SESSION was set from the "login" page,
     the user name is assigned to a variable.
   - L.93 start php. It defines variable for each question.
   - Next, it checks error of input data for each question.
   - L.255 start PHP. It calls the "form_lulc.html" file.
   - Next, it calls the login database and data for connection.
   - By a query, data is inserted into the DDBB
   - L.304. Make changes for test. Read instructions into the file.
   
3. "form_lulc.html"
   - This files sets all the survey questions and answer option.
   - Notice that each type of question has a propper structure:
	 unique answer question, multianswer question, numerical question,
	 literal answer question.

4. "done_lulc_test.php"
   - This is useful when testing the performance of "insert_lulc_info.php" and "form_lulc.html" files.
   - When we run "insert_lulc_info.php", after submitting it jumps to "login_ok.php" page 
     with no chance to see if "insert_lulc_info.php" and "form_lulc.html" are working ok.
   - To test them, make changes in some code-lines of "insert_lulc_info.php" to jump 
     into "done_lulc_test.php" and see that DB-connection, insert data, etc. are working ok.

5. Testing "insert_lulc_info.php" in localhost.
   In "insert_lulc_info.php" (L.315: echo("<script>location.href = '../login/login_ok.php';</script>");//E: Send back to 'login_ok.php'),
   
   - When this line is activated (used for running in REMOTE host)
   echo("<script>location.href = '../login/login_ok.php';</script>");
	 it goes back to "login_ok.php"
	 
	 
   - When this line is activated (used for Testing in LOCAL host)
   echo("<script>location.href = 'done_exp_test.php';</script>");
	 it goes back to "done_exp_test.php"
	 
   - When both previous options are as comment, it prints echo messages
     (used for Testing at LOCAL host)

5. DATABASE. Answers of survey are stored at:
   OSU server (remote host)
   - DB: "wrestore".  (See: ../pages/data_login/data_db_login1.php)
   - Table: "user_list".  (See: ../pages/data_login/connect_local_remote_login1.php)
   
   LOCAL server (local host)
   - DB: "igmi2db".  (See: ../pages/data_login/data_db_login1.php)
   - Table: "user_list".  (See: ../pages/data_login/connect_local_remote_login1.php)
	 
   Important: It is needed to create columns for each survey question 
   before interacting with the DDBB
	 
	 
	 