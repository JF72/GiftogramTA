**NAME: ** Jason Fernandez
**TIME: ** This test took me about 6 hours including setting up.
##Summary
I started by downloading Laravel on my system and DBngin for the server. I decided to use PHP and the Laravel framework because I have more familiarity with that framework. After reviewing the assessment, I started by developing the migrations. The Laravel environment had a pre-made user migration so I altered it to fit the specifications of the assessment such as splitting name to first name and last name. Then I created the message migration. I altered the existing user model to fit our specifications. With that complete, I moved on to making the user functions of register and login. In the register function, I started by validating the information with all fields being required. The user email input would also have to be unique to avoid repeated emails. Once validated, it would be created in the database and a return response with the users info, except the password, would be returned. 
The login function starts by validating the users email and password. I would then look up the user's email and check if it exists in the database. If the user’s email does not exist then we will return an error message. I used the sample code and title and slightly tweaked the message to say the email is invalid. Then the password is hashed and checked to make sure it is the correct password. If the password is incorrect, they get a message saying invalid password with the same sample code and title. Similarly to the register function, a return response with the users info, except the password, are returned. 
Before moving onto the chat controller, I developed the message model with fillable sender_user_id, receiver_user_id, and message. I developed the listAllUsers function first as it seemed the easiest to create. It validates the requester id and then finds the rest of users except for the requester. The return response is the users. I then created the sendMessage function which starts by validating the sender_user_id, receiver_user_id, and message. Once validated, it is created in the database followed by a return response of a successful message being sent. Lastly, I created the viewMessages function which starts by validating user id’s of user a and user b. Once validated, the database is searched where the sender_user_id and receiver_user_id or userIdA and userIdB and vice versa. Afterwards, the return response returns the messages id, sender id, message, and epoch.
Testing was done using curl.

##Suggested improvements:
Vague error messages
I altered these to be case specific, either an email issue or password issue
Chat endpoints don’t have authentication making them accessible to anyone who has the URL
No use of pagination which would delay the site as the app grows in popularity and overwhelm the user
View_messages should be limited to 10 most recent
The view and send messages should be a POST and GET function under a messages endpoint

##Database
The SQL dump is under database and titled giftogram_chat.sql